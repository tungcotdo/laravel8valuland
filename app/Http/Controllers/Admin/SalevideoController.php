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

class SalevideoController extends Controller
{
    public function render(Request $request){
        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        $template = view('admin.partials.sale_video', ['sale' =>  $sale])->render();
        return Response()->json(["success" => true, "template" => $template]);
    }

    public function upload(Request $request){
        try{
            $file = $request->file('file');

            $file_name = rand().'.'.$file->extension();
                
            $upload_path = 'upload'. '/'. 'sale' . '/' . $request->sale_id  . '/' . 'video' . '/';
            
            $file->move($upload_path, $file_name);

            $sale_video_path = $upload_path . $file_name;
            
            DB::table('sale')
            ->where('sale_id', $request->sale_id)
            ->update([
                'sale_video_path' => $sale_video_path
            ]);

            $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
            $template = view('admin.partials.sale_video', ['sale' =>  $sale])->render();
            return Response()->json(["success" => true, "template" => $template]);
        }
        catch(Exception $e){
            return Redirect::to(URL::previous() . "#sale-img")->with('success', 'Có lỗi xảy ra!');
        }
    }

    public function delete(Request $request){
        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        File::delete($sale->sale_video_path);
        DB::table('sale')
        ->where('sale_id', $request->sale_id)
        ->update([
            'sale_video_path' => ''
        ]);
        $template = view('admin.partials.sale_video', ['sale' => null])->render();
        return Response()->json(["success" => true, "template" => $template]);
    }
}
