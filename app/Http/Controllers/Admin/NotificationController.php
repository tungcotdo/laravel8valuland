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

class NotificationController extends Controller
{


    public function index(Request $request){
        $this->_authorization('admin', 'notification', 'index');
        $query = DB::table('notification');

        if( !empty( $request->notification_title ) ){
            $query->where( 'notification_title', 'LIKE', '%'.$request->notification_title.'%' );
        }

        if( !empty( $request->notification_content ) ){
            $query->where( 'notification_content', 'LIKE', '%'.$request->notification_content.'%' );
        }

        $compact['notifications'] = $query->get();
        return view('admin.notification.index', $compact);
    }
    public function send(Request $request){
        $this->_authorization('admin', 'notification', 'send');
        $notification = DB::table('notification')->where('notification_id', $request->notification_id)->first();

        if( !empty( $notification->notification_user_group_id ) ){
            $notification_user_group_id = explode(',', $notification->notification_user_group_id);

            $users = DB::table('users')->whereIn('user_group_id', $notification_user_group_id)->get();

            $notification_issend = (bool)!empty( $request['notification_issend'] );

            DB::table('notification')->where('notification_id', $request->notification_id)->update([
                'notification_issend'  => $notification_issend,
            ]);

            foreach( $users as $value ){
                DB::table('notification_user')->where([
                    'user_id'  => $value->id,
                    'notification_id'  => $request->notification_id,
                ])->delete();

                DB::table('notification_user')->insert([
                    'user_id'  => $value->id,
                    'user_group_id'  => $value->user_group_id,
                    'notification_id'  => $request->notification_id,
                    'notification_isread' => 0
                ]);
            }

            return redirect()->back()->with('success', 'Đã gửi thông báo thành công!');
        }
        
        return redirect()->back()->with('error', 'Có lỗi xảy ra!');
    }

    public function term(Request $request){
        $this->_authorization('admin', 'notification', 'add');
        $compact['setting'] = DB::table('setting')->where('key', 'rent_deadline_date')->first();

        return view('admin.notification.term', $compact);
    }

    public function add(Request $request){
        $this->_authorization('admin', 'notification', 'add');
        $compact['user_groups'] = DB::table('user_group')->get();
        return view('admin.notification.add', $compact);
    }
    public function store(Request $request){
        $this->_authorization('admin', 'notification', 'add');
        $notification_user = $request->notification_user;

        $notification_user_group_id= array_keys($notification_user);

        $notification_issend = (bool)!empty( $request['notification_issend'] );

        $notification_id = DB::table('notification')->insertGetId([
            'notification_title'  => $request['notification_title'],
            'notification_content' => $request['notification_content'],
            'notification_user_group' => implode(',', $notification_user),
            'notification_user_group_id' => implode(',', $notification_user_group_id),
            'notification_created_by'  => Auth::user()->email,
            'notification_updated_by'  => Auth::user()->email,
            'notification_created_at'  => Carbon::now(),
            'notification_updated_at'  => Carbon::now(),
            'notification_issend'  => $notification_issend,
        ]);

        if( $notification_issend ){
            $users = DB::table('users')->whereIn('user_group_id', $notification_user_group_id)->get();
        
            foreach( $users as $value ){
                DB::table('notification_user')->insert([
                    'user_id'  => $value->id,
                    'user_group_id'  => $value->user_group_id,
                    'notification_id'  => $notification_id,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Thêm dữ liệu thành công!');
    }
    public function edit(Request $request){
        $this->_authorization('admin', 'notification', 'edit');
        $compact['notification'] = DB::table('notification')->where('notification_id', $request->notification_id)->first();
        if( !empty( $compact['notification'] ) ){
            $compact['notification_user'] = explode(',', $compact['notification']->notification_user_group_id);
            $compact['user_groups'] = DB::table('user_group')->get();
            return view('admin.notification.edit', $compact);
        }
        return route('admin.notification.index');
    }
    public function view(Request $request){
        $compact['notification'] = DB::table('notification')->where('notification_id', $request->notification_id)->first();
        DB::table('notification_user')
        ->where('user_id', Auth::user()->id)
        ->where('notification_id', $request->notification_id)
        ->update(['notification_isread' => 1]);

        return view('admin.notification.view', $compact);
    }
    public function update(Request $request){
        $this->_authorization('admin', 'notification', 'edit');
        $notification_user = $request->notification_user;

        $notification_user_group_id= array_keys($notification_user);

        $notification_issend = (bool)!empty( $request['notification_issend'] );

        DB::table('notification')->where('notification_id', $request->notification_id)->update([
            'notification_title'  => $request['notification_title'],
            'notification_content' => $request['notification_content'],
            'notification_user_group' => implode(',', $notification_user),
            'notification_user_group_id' => implode(',', $notification_user_group_id),
            'notification_created_by'  => Auth::user()->email,
            'notification_updated_by'  => Auth::user()->email,
            'notification_created_at'  => Carbon::now(),
            'notification_updated_at'  => Carbon::now(),
            'notification_issend'  => $notification_issend,
        ]);

        if( $notification_issend ){
            $users = DB::table('users')->whereIn('user_group_id', $notification_user_group_id)->get();

            foreach( $users as $value ){
                DB::table('notification_user')->where([
                    'user_id'  => $value->id,
                    'notification_id'  => $request->notification_id,
                ])->delete();

                DB::table('notification_user')->insert([
                    'user_id'  => $value->id,
                    'user_group_id'  => $value->user_group_id,
                    'notification_id'  => $request->notification_id,
                    'notification_isread' => 0
                ]);
            }
        }

        return redirect()->back()->with('success', 'Cập nhật dữ liệu thành công!');
    }
    public function delete(Request $request){
        $this->_authorization('admin', 'notification', 'delete');
        DB::table('notification')->where('notification_id', $request->notification_id)->delete();
        DB::table('notification_user')->where('notification_id', $request->notification_id)->delete();
        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!'); 
    }
}
