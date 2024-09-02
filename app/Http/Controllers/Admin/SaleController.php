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
use App\Services\SaleService;
use Validator,Response,File,Route;

class SaleController extends Controller
{
    private $_sale;
    private $_house;

    function __construct(){
        parent::__construct();
        $this->_sale = new SaleService();
        $this->_house = new HouseService();
    }

    public function raw(Request $request){
        $this->_authorization('admin', 'sale', 'index');

        $query = DB::table('sale')->where('sale_status', 1);

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

        $sale_raws = $query->get();
        return view('admin.sale.raw', ['sale_raws' => $sale_raws]);
    }
    
    public function select(Request $request){
        $this->_authorization('admin', 'sale', 'select');

        $query = DB::table('sale')->where('sale_status', 2);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        $sale_selects = $query->get();
        return view('admin.sale.select', ['sale_selects' => $sale_selects, 'house' => $this->_house]);
    }
    
    public function sold(Request $request){
        $this->_authorization('admin', 'sale', 'sold');

        $query = DB::table('sale')->whereIn('sale_status', [4, 5]);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        if( !empty( $request->sale_style ) ){
            $query->where( 'sale_style', 'LIKE', '%'.$request->sale_style.'%' );
        }

        if( !empty( $request->sale_status ) ){
            $query->where( 'sale_status', 'LIKE', '%'.$request->sale_status.'%' );
        }

        $sale_solds = $query->get();
        return view('admin.sale.sold', ['sale_solds' => $sale_solds, 'house' => $this->_house]);
    }
    
    public function add(Request $request){
        $this->_authorization('admin', 'sale', 'add');
        return view('admin.sale.add');
    }

    public function store(Request $request){
        $this->_authorization('admin', 'sale', 'add');

        $this->_sale->store($request);

        if( $request->sale_status == 1 ){
            return redirect()->route('admin.sale.raw')->with('success', $this->_message['update']);
        }
        
        if( $request->sale_status == 2 ){
            return redirect()->route('admin.sale.select')->with('success', $this->_message['update']);
        }

        return redirect()->back()->with('success', $this->_message['store']);
    }

    public function edit(Request $request){
        $this->_authorization('admin', 'sale', 'edit');
        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        return view('admin.sale.edit', ['sale' => $sale, 'house' => $this->_house]);
    }

    public function update(Request $request){
        $this->_authorization('admin', 'sale', 'edit');
        $this->_sale->update($request);

        if( $request->sale_status == 1 ){
            return redirect()->route('admin.sale.raw')->with('success', $this->_message['update']);
        }
        
        if( $request->sale_status == 2 ){
            return redirect()->route('admin.sale.select')->with('success', $this->_message['update']);
        }

        return redirect()->back()->with('success', $this->_message['update']);
    }

    public function delete(Request $request){
        $this->_authorization('admin', 'sale', 'delete');

        File::deleteDirectory($this->_getuploadpath('sale', $request->sale_id));
        DB::table('sale')->where('sale_id',$request->sale_id)->delete();

        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!'); 
    }

    public function status(Request $request){
        $this->_authorization('admin', 'sale', 'status');
        DB::table('sale')->where('sale_id', $request->sale_id)->update([
            'sale_status' => $request->sale_status
        ]);
        return redirect()->back()->with('success', $this->_message['update']);
    }
}
