<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;
use DB;
use Carbon\Carbon;
use Validator,Response,File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class RentvideoController extends Controller
{
    public function render(Request $request){
        $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
        $template = view('admin.partials.rent_video', ['rent' =>  $rent])->render();
        return Response()->json(["success" => true, "template" => $template]);
    }

    public function upload(Request $request){
        try{
            $file = $request->file('file');

            $file_name = rand().'.'.$file->extension();
                
            $upload_path = 'upload'. '/'. 'rent' . '/' . $request->rent_id  . '/' . 'video' . '/';
            
            $file->move($upload_path, $file_name);

            $rent_video_path = $upload_path . $file_name;
            
            DB::table('rent')
            ->where('rent_id', $request->rent_id)
            ->update([
                'rent_video_path' => $rent_video_path
            ]);

            $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
            $template = view('admin.partials.rent_video', ['rent' =>  $rent])->render();
            return Response()->json(["success" => true, "template" => $template]);
        }
        catch(Exception $e){
            return Redirect::to(URL::previous() . "#rent-img")->with('success', 'Có lỗi xảy ra!');
        }
    }

    public function delete(Request $request){
        $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
        File::delete($rent->rent_video_path);
        DB::table('rent')
        ->where('rent_id', $request->rent_id)
        ->update([
            'rent_video_path' => ''
        ]);
        $template = view('admin.partials.rent_video', ['rent' => null])->render();
        return Response()->json(["success" => true, "template" => $template]);
    }
}
