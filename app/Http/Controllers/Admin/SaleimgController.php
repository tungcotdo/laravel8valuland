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
    public function render(Request $request){
        $imgs = DB::table('sale_img')->where('sale_id', $request->sale_id)->get();
                
        $template = view('admin.partials.sale_img', ['imgs' => $imgs])->render();

        return Response()->json(["success" => true, "template" => $template]);
    }

    public function upload(Request $request){

            $upload_service = new UploadService();
            $uploadPaths = $upload_service->uploadManyFile(
                $request->file('files'), 
                'sale' . '/' . $request->sale_id  . '/',
                function( $path ){
                    DB::table('sale_img')->insert([
                        'sale_id' => $request->sale_id,
                        'sale_img_path' => $path,
                        'sale_img_created_at'  => Carbon::now(),
                        'sale_img_updated_at'  => Carbon::now()
                    ]);
                }          
            );
   
            $imgs = DB::table('sale_img')->where('sale_id', $request->sale_id)->get();
                
            $template = view('admin.partials.sale_img', ['imgs' => $imgs])->render();

            return Response()->json(["success" => true, "template" => $template]);
    }

    public function delete(Request $request){
        $sale_img = DB::table('sale_img')->where('sale_img_id', $request->sale_img_id)->first();
        
        File::delete($sale_img->sale_img_path);
        
        DB::table('sale_img')->where('sale_img_id', $request->sale_img_id)->delete();

        $imgs = DB::table('sale_img')->where('sale_id', $sale_img->sale_id)->get();
                
        $template = view('admin.partials.sale_img', ['imgs' => $imgs])->render();

        return Response()->json(["success" => true, "template" => $template]);
    }
}
