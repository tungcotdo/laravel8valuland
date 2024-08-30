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

class SaletranController extends Controller
{
    public function index(Request $request){
        $this->_authorization(8);
        $query = DB::table('sale')->where('sale_status', 3);

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

        $sale_transactions = $query->get();
        return view('admin.saletran.index', ['sale_transactions' => $sale_transactions]);
    }

    public function edit(Request $request){
        $this->_authorization(20);
        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        return view('admin.sale.edit-transaction', ['sale' => $sale, 'house' => new House]);
    }

    public function update(Request $request){
        $this->_authorization(20);
        $this->_upload->one([
            'file' => $request->file('sale_contract_img'),
            'uploadpath' => 'sale' . '/' . $request->sale_id  . '/',
            'delpath' => $request->sale_contract_img_text,
            'callback' => function( $path ){
                DB::table('sale')->where('sale_id', $request->sale_id)->update([
                    'sale_price' => $request->sale_price,
                    'sale_deposit' => $request->sale_deposit,
                    'sale_deposit_date' => $request->sale_deposit_date,
                    'sale_contract_date' => $request->sale_contract_date,
                    'sale_broker' => $request->sale_broker,
                    'sale_legal_person' => $request->sale_legal_person,
                    'sale_contract_img' => $path,
                    'sale_style' => $request->sale_style,
                    'sale_created_by'  => Auth::user()->email,
                    'sale_updated_by'  => Auth::user()->email,
                    'sale_created_at'  => Carbon::now(),
                    'sale_updated_at'  => Carbon::now()
                ]);
            }          
        ]);
            
        return redirect()->route('admin.saletran.index')->with('success', $this->_message['update']);
    }
    
}
