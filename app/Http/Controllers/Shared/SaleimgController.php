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

class SaleimgController extends Controller
{
    private $_upload;

    function __constructor(){
        parent::__construct();
        $this->_upload = new UploadService();
    }

    function viewIMG( $sale_id ){
        $imgs = DB::table('sale_img')->where('sale_id', $request->sale_id)->get();
        return view('admin.partials.sale_img', ['imgs' => $imgs])->render();
    }

    public function render(Request $request){
        return Response()->json(["success" => true, "template" => $this->viewIMG($request->sale_id)]);
    }

    public function upload(Request $request){
        $this->_upload->many([
            'file' => $request->file('files'),
            'uploadpath' => 'sale' . '/' . $request->sale_id  . '/',
            'callback' => function( $path ){
                DB::table('sale_img')->insert([
                    'sale_id' => $request->sale_id,
                    'sale_img_path' => $path,
                    'sale_img_created_at'  => Carbon::now(),
                    'sale_img_updated_at'  => Carbon::now()
                ]);
            }          
        ]);
        return Response()->json(["success" => true, "template" => $this->viewIMG($request->sale_id)]);
    }

    public function delete(Request $request){
        $sale_img = DB::table('sale_img')->where('sale_img_id', $request->sale_img_id)->first();
        File::delete($sale_img->sale_img_path);
        DB::table('sale_img')->where('sale_img_id', $request->sale_img_id)->delete();
        return Response()->json(["success" => true, "template" => $this->viewIMG( $sale_img->sale_id )]);
    }
}
