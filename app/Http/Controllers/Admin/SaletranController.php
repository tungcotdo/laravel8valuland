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
use App\Services\HouseService;
use App\Services\UploadService;
use Validator,Response,File, Route;

class SaletranController extends Controller
{
    private $_upload;
    private $_house;

    function __construct(){
        parent::__construct();
        $this->_upload = new UploadService();
        $this->_house  = new HouseService();
    }

    public function index(Request $request){
        $this->_authorization('admin', 'sale', 'transaction');

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
        $this->_authorization('admin', 'sale', 'transaction');

        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        return view('admin.saletran.edit', ['sale' => $sale, 'house' =>  $this->_house]);
    }

    public function update(Request $request){
        $this->_authorization('admin', 'sale', 'transaction');

        if( !empty( $request->file('sale_contract_img') ) ){
            $this->_upload->one([
                'file' => $request->file('sale_contract_img'),
                'uploadpath' => $this->_getuploadpath('sale', $request->sale_id, true),
                'delpath' => $request->sale_contract_img_text,
                'callback' => function( $path, $request ){
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
            ], $request);
        }
            
        return redirect()->route('admin.saletran.index')->with('success', $this->_message['update']);
    }
    
}
