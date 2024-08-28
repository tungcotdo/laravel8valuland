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

class RentranController extends Controller
{
    public function index(Request $request){
        $this->_authorization(8);
        $query = DB::table('rent')->where('rent_status', 3);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        if( !empty( $request->owner_name ) ){
            $query->where( 'owner_name', 'LIKE', '%'.$request->owner_name.'%' );
        }

        if( !empty( $request->owner_phone ) ){
            $query->where( 'owner_phone', 'LIKE', '%'.$request->owner_phone.'%' );
        }

        if( !empty( $request->owner_demand ) ){
            $query->where( 'owner_demand', $request->owner_demand );
        }

        $rent_transactions = $query->get();
        return view('admin.rentran.index', ['rent_transactions' => $rent_transactions]);
    }

    public function edit(Request $request){
        $this->_authorization(20);
        $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
        return view('admin.rent.edit-transaction', ['rent' => $rent, 'house' => new House]);
    }

    public function update(Request $request){
        $this->_authorization(20);
        try{
            $file = $request->file('rent_contract_img');
            $rent_contract_img = $request->rent_contract_img_text;
            
            if( !empty( $file ) ){
                $file_name = rand().'.'.$file->extension();
                
                $upload_path = 'upload'. '/'. 'rent' . '/' . $request->rent_id  . '/';
                
                $file->move($upload_path, $file_name);
    
                File::delete($request->rent_contract_img_text);

                $rent_contract_img = $upload_path . $file_name;
            }

            DB::table('rent')->where('rent_id', $request->rent_id)->update([
                'rent_price' => $request->rent_price,
                'rent_deposit' => $request->rent_deposit,
                'rent_deposit_date' => $request->rent_deposit_date,
                'rent_contract_date' => $request->rent_contract_date,
                'rent_broker' => $request->rent_broker,
                'rent_legal_person' => $request->rent_legal_person,
                'rent_contract_img' => $rent_contract_img,
                'rent_style' => $request->rent_style,
                'rent_created_by'  => Auth::user()->email,
                'rent_updated_by'  => Auth::user()->email,
                'rent_created_at'  => Carbon::now(),
                'rent_updated_at'  => Carbon::now()
            ]);
            
            return redirect()->route('admin.rentran.index')->with('success', 'Cập nhật dữ liệu giao dịch thành công!');
           
        }
        catch(Exception $e){
            return  redirect()->back()->with('error', 'Có lỗi xảy ra!');
        }


    }
    
}
