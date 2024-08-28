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

class SaleimgController extends Controller
{
    public function render(Request $request){
        $imgs = DB::table('sale_img')->where('sale_id', $request->sale_id)->get();
                
        $template = view('admin.partials.sale_img', ['imgs' => $imgs])->render();

        return Response()->json(["success" => true, "template" => $template]);
    }

    public function upload(Request $request){
        try{
            $files = $request->file('files');

            foreach( $files as $key => $file ){

                $file_name = rand().'.'.$file->extension();
                
                $upload_path = 'upload'. '/'. 'sale' . '/' . $request->sale_id  . '/';
                
                $file->move($upload_path, $file_name);
                
                DB::table('sale_img')->insert([
                    'sale_id' => $request->sale_id,
                    'sale_img_path' => $upload_path . $file_name,
                    'sale_img_created_at'  => Carbon::now(),
                    'sale_img_updated_at'  => Carbon::now()
                ]);
            }

            $imgs = DB::table('sale_img')->where('sale_id', $request->sale_id)->get();
                
            $template = view('admin.partials.sale_img', ['imgs' => $imgs])->render();

            return Response()->json(["success" => true, "template" => $template]);

        }
        catch(Exception $e){
            return Redirect::to(URL::previous() . "#sale-img")->with('success', 'Có lỗi xảy ra!');
        }
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
