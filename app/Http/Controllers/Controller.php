<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use PhpParser\Node\FunctionLike;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use Route;
use Artisan;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct(){

        Artisan::call('cache:clear');

        $this->middleware(function ($request, $next) {
            $compact['_notification'] = DB::table('notification as n')
            ->leftjoin('notification_user as nu', 'n.notification_id', '=', 'nu.notification_id')
            ->where('nu.user_group_id', Auth::user()->user_group_id)
            ->orderBy('nu.notification_isread', 'ASC')
            ->orderBy('n.notification_id', 'DESC')
            ->get();

            $compact['_notification_count'] = DB::table('notification_user')
            ->where('user_id', Auth::user()->id)
            ->where('notification_isread', 0)
            ->count();

            $compact['_authorization'] =  function($function_id){
                $user_group_function = DB::table('user_group_function')->where('user_group_id', Auth::user()->user_group_id)->first();
                $function_ids = explode(',', $user_group_function->function_id);
                if( !in_array($function_id, $function_ids) ){
                    return false;
                }
                return true;
            };

            View::share($compact);
            return $next($request);
        });
    }

    public function _authorization($function_id){
        $user_group_function = DB::table('user_group_function')->where('user_group_id', Auth::user()->user_group_id)->first();

        $function_ids = explode(',', $user_group_function->function_id);

        if( !in_array($function_id, $function_ids) ){
            dd("Bạn không có quyền truy cập");
        }
    }
}
