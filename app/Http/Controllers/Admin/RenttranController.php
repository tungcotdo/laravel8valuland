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

class RenttranController extends Controller
{
    private $_upload;
    private $_house;

    function __construct(){
        parent::__construct();
        $this->_upload = new UploadService();
        $this->_house  = new HouseService();
        
    }

    public function index(Request $request){
        $this->_authorization('admin', 'rent', 'transaction');
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
        return view('admin.renttran.index', ['rent_transactions' => $rent_transactions]);
    }

    public function edit(Request $request){
        $this->_authorization('admin', 'rent', 'transaction');
        $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
        return view('admin.renttran.edit', ['rent' => $rent, 'house' =>  $this->_house]);
    }

    public function update(Request $request){
        $this->_authorization('admin', 'rent', 'transaction');
        if( !empty( $request->file('rent_contract_img') ) ){
            $this->_upload->one([
                'file' => $request->file('rent_contract_img'),
                'uploadpath' => $this->_getuploadpath('rent', $request->rent_id, true),
                'delpath' => $request->rent_contract_img_text,
                'callback' => function( $path, $request ){
                    DB::table('rent')->where('rent_id', $request->rent_id)->update([
                        'rent_price' => $request->rent_price,
                        'rent_deposit' => $request->rent_deposit,
                        'rent_deposit_date' => $request->rent_deposit_date,
                        'rent_contract_date' => $request->rent_contract_date,
                        'rent_broker' => $request->rent_broker,
                        'rent_legal_person' => $request->rent_legal_person,
                        'rent_contract_img' => $path,
                        'rent_style' => $request->rent_style,
                        'rent_created_by'  => Auth::user()->email,
                        'rent_updated_by'  => Auth::user()->email,
                        'rent_created_at'  => Carbon::now(),
                        'rent_updated_at'  => Carbon::now()
                    ]);
                }          
            ], $request);
        }
            
        return redirect()->route('admin.renttran.index')->with('success', $this->_message['update']);
    }
    
}
