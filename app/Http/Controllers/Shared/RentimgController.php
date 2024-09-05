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

class RentimgController extends Controller
{
    private $_upload;
    

    function __construct(){
        parent::__construct();
        $this->_upload = new UploadService();
    }

    function viewIMG( $rent_id ){
        $imgs = DB::table('rent_img')->where('rent_id', $rent_id)->get();
        return view('admin.partials.rent_img', ['imgs' => $imgs])->render();
    }

    public function render(Request $request){
        return Response()->json(["success" => true, "template" => $this->viewIMG($request->rent_id)]);
    }

    public function upload(Request $request){
        $this->_upload->many([
            'files' => $request->file('files'),
            'uploadpath' => $this->_getuploadpath('rent', $request->rent_id, true),
            'callback' => function( $path, $request ){
                DB::table('rent_img')->insert([
                    'rent_id' => $request->rent_id,
                    'rent_img_path' => $path,
                    'rent_img_created_at'  => Carbon::now(),
                    'rent_img_updated_at'  => Carbon::now()
                ]);
            }          
        ], $request);
        return Response()->json(["success" => true, "template" => $this->viewIMG($request->rent_id)]);
    }

    public function delete(Request $request){
        $rent_img = DB::table('rent_img')->where('rent_img_id', $request->rent_img_id)->first();
        File::delete($rent_img->rent_img_path);
        DB::table('rent_img')->where('rent_img_id', $request->rent_img_id)->delete();
        return Response()->json(["success" => true, "template" => $this->viewIMG( $rent_img->rent_id )]);
    }
}
