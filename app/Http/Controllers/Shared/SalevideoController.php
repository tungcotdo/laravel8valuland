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
use App\Services\UploadService;


class SalevideoController extends Controller
{
    private $_upload;

    function __constructor(){
        parent::__construct();
        $this->_upload = new UploadService();
    }

    function viewVideo( $sale_id ){
        $sale = DB::table('sale')->where('sale_id', $sale_id)->first();
        return view('admin.partials.sale_video', ['sale' =>  $sale])->render();
    }

    public function render(Request $request){
        return Response()->json(["success" => true, "template" => $this->viewVideo($request->sale_id)]);
    }

    public function upload(Request $request){
        $this->_upload->one([
            'file' => $request->file('file'),
            'uploadpath' => 'sale' . '/' . $request->sale_id  . '/' . 'video' . '/',
            'callback' => function( $path ){
                DB::table('sale')
                ->where('sale_id', $request->sale_id)
                ->update(['sale_video_path' => $path]);
            }          
        ]);

        return Response()->json(["success" => true, "template" => $this->viewVideo($request->sale_id)]);
    }

    public function delete(Request $request){
        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        File::delete($sale->sale_video_path);
        DB::table('sale')
        ->where('sale_id', $request->sale_id)
        ->update(['sale_video_path' => NULL]);
        
        return Response()->json(["success" => true, "template" => $this->viewVideo($request->sale_id)]);
    }
}
