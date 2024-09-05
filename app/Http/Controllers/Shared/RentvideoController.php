<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;
use DB;
use Carbon\Carbon;
use Validator,Response,File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Services\UploadService;


class RentvideoController extends Controller
{
    private $_upload;

    function __construct(){
        parent::__construct();
        $this->_upload = new UploadService();
    }

    function viewVideo( $rent_id ){
        $rent = DB::table('rent')->where('rent_id', $rent_id)->first();
        return view('admin.partials.rent_video', ['rent' =>  $rent])->render();
    }

    public function render(Request $request){
        return Response()->json(["success" => true, "template" => $this->viewVideo($request->rent_id)]);
    }

    public function upload(Request $request){
        $this->_upload->one([
            'file' => $request->file('file'),
            'uploadpath' => $this->_getuploadpath('rent', $request->rent_id, true),
            'callback' => function( $path, $request ){
                DB::table('rent')
                ->where('rent_id', $request->rent_id)
                ->update(['rent_video_path' => $path]);
            }          
        ], $request);

        return Response()->json(["success" => true, "template" => $this->viewVideo($request->rent_id)]);
    }

    public function delete(Request $request){
        $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
        File::delete($rent->rent_video_path);
        DB::table('rent')
        ->where('rent_id', $request->rent_id)
        ->update(['rent_video_path' => NULL]);
        
        return Response()->json(["success" => true, "template" => $this->viewVideo($request->rent_id)]);
    }
}
