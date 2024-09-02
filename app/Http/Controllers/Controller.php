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

    public $_message = [
        'store'  => 'Thêm dữ liệu thành công',
        'update' => 'Cập nhật thành công',
        'delete' => 'Xóa dữ liệu thành công'
    ];

    public function _getuploadpath($folder, $id, $ds_last = false){
        $DS = '/';
        return 'upload' . $DS . $folder . $DS. $id . ( $ds_last ? $DS : '' );
    }

    public function _authorization($function_group, $function_controller, $function_action, $view = false){
        $function = DB::table('function')->where([
            'function_group' => $function_group,
            'function_controller' => $function_controller,
            'function_action' => $function_action
        ])->first();

        if( !empty( $function ) ){
            $user_group_function = DB::table('user_group_function')->where('user_group_id', Auth::user()->user_group_id)->first();

            $function_ids = explode(',', $user_group_function->function_id);
            if( !in_array($function->function_id, $function_ids) ){
                if( !$view ){
                    throw new \Illuminate\Http\Exceptions\HttpResponseException(redirect()->route('error.404'));
                }
                return false;
            }
        }

        return true;
    }

    function __construct(){
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

            $compact['_authorization'] = function($function_group, $function_controller, $function_action, $view = false){
                return $this->_authorization($function_group, $function_controller, $function_action,  $view);
            };

            $compact['_getuploadpath'] = function( $folder, $id){
                return $this->_getuploadpath($folder, $id);
            };

            View::share($compact);
            return $next($request);
        });
    }
}
