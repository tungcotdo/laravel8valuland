<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FileExport;
use App\Imports\FileImport;
use DB;
use Carbon\Carbon;
use Auth;

class AuthorizationController extends Controller
{
    public function index(Request $request){
        $this->_authorization(26);
        $compact['user_groups'] = DB::table('user_group')->get();
        return view('admin.authorization.index', $compact);
    }
    public function add(Request $request){
        $compact['functions'] = DB::table('function')->get();
        return view('admin.authorization.add', $compact);
    }
    public function store(Request $request){
        $this->_authorization(26);
        $user_group_id = DB::table('user_group')->insertGetId([
            'user_group_name'  => $request['user_group_name'],
            'user_group_description' => $request['user_group_description'],
            'user_group_created_at'  => Carbon::now(),
            'user_group_updated_at'  => Carbon::now()
        ]);

        $function_select = implode(',', $request['function_select']);

        DB::table('user_group_function')->insert([
            'user_group_id'  => $user_group_id,
            'function_id' => $function_select
        ]);

        return redirect()->back()->with('success', 'Thêm dữ liệu thành công!');
    }
    public function edit(Request $request){
        $this->_authorization(26);
        $compact['user_group'] = DB::table('user_group')->where('user_group_id', $request->authorization_id)->first();
        $compact['functions'] = DB::table('function')->orderBy('function_group')->get();
        $user_group_function = DB::table('user_group_function')->where('user_group_id', $request->authorization_id)->first();
        if( !empty( $user_group_function->function_id ) ){
            $compact['user_group_function_id'] = explode(',', $user_group_function->function_id);
        }
        return view('admin.authorization.edit', $compact);
    }
    public function update(Request $request){
        $this->_authorization(26);
        DB::table('user_group')->where('user_group_id', $request->authorization_id)->update([
            'user_group_name'  => $request['user_group_name'],
            'user_group_description' => $request['user_group_description'],
            'user_group_created_at'  => Carbon::now(),
            'user_group_updated_at'  => Carbon::now()
        ]);

        DB::table('user_group_function')->where('user_group_id', $request->authorization_id)->delete();
        
        $function_select = implode(',', $request['function_select']);
        DB::table('user_group_function')->insert([
            'user_group_id'  => $request->authorization_id,
            'function_id' => $function_select
        ]);

        return redirect()->back()->with('success', 'Cập nhật dữ liệu thành công!');
    }
    public function delete(Request $request){
        $this->_authorization(26);
        DB::table('user_group_function')->where('user_group_id', $request->authorization_id)->delete();
        DB::table('user_group')->where('user_group_id', $request->authorization_id)->delete();
        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!');
    }
}
