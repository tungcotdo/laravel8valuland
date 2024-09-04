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
use App\Services\House;
use Validator,Response,File, Route;


class ContractController extends Controller
{
    public function index(Request $request){
        $this->_authorization('admin', 'contract', 'index');
        $compact['contracts'] = DB::table('contract')->get();
        return view('admin.contract.index', $compact);
    }
    public function add(Request $request){
        $this->_authorization('admin', 'contract', 'add');
        return view('admin.contract.add');
    }
    public function store(Request $request){
        $this->_authorization('admin', 'contract', 'add');
        try{
            $file = $request->file('contract_file');

            if( !empty( $file ) ){
                $file_name = rand().'.'.$file->extension();
                
                $upload_path = 'upload'. '/'. 'contract' . '/';
                
                $file->move($upload_path, $file_name);

                $contract_path = $upload_path . $file_name;
            }

            DB::table('contract')->insert([
                'contract_title' => $request->contract_title,
                'contract_description' => $request->contract_description,
                'contract_path' => $contract_path
            ]);
            
            return redirect()->back()->with('success', 'Thêm dữ liệu thành công!');
           
        }
        catch(Exception $e){
            return Redirect::to(URL::previous() . "#sale-img")->with('success', 'Có lỗi xảy ra!');
        }

    }
    public function edit(Request $request){
        $this->_authorization('admin', 'contract', 'edit');
        $compact['contract'] = DB::table('contract')->where('contract_id', $request->contract_id)->first();
        return view('admin.contract.edit', $compact);
    }
    public function update(Request $request){
        $this->_authorization('admin', 'contract', 'edit');
        try{
            $file = $request->file('contract_file');
            $contract_path = $request->contract_file_text;
            if( !empty( $file ) ){
                $file_name = rand().'.'.$file->extension();
                
                $upload_path = 'upload'. '/'. 'contract' . '/';
                
                $file->move($upload_path, $file_name);
    
                File::delete($request->contract_file_text);

                $contract_path = $upload_path . $file_name;
            }

            DB::table('contract')->where('contract_id', $request->contract_id)->update([
                'contract_title' => $request->contract_title,
                'contract_description' => $request->contract_description,
                'contract_path' => $contract_path
            ]);
            
            return redirect()->back()->with('success', 'Cập nhật dữ liệu thành công!');
           
        }
        catch(Exception $e){
            return Redirect::to(URL::previous() . "#sale-img")->with('success', 'Có lỗi xảy ra!');
        }
    }
    public function delete(Request $request){
        $this->_authorization('admin', 'contract', 'delete');
        $contract = DB::table('contract')->where('contract_id', $request->contract_id)->first();
        DB::table('contract')->where('contract_id', $request->contract_id)->delete();
        File::delete($contract->contract_path);
        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!');
    }
}
