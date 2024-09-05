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
use App\Services\RentService;
use Validator,Response,File,Route;

class RentController extends Controller
{
    private $_rent;
    private $_house;

    function __construct(){
        parent::__construct();
        $this->_rent = new RentService();
        $this->_house = new HouseService();
    }

    public function raw(Request $request){
        $this->_authorization('admin', 'rent', 'index');

        $query = DB::table('rent')->where('rent_status', 1);

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

        $rent_raws = $query->get();
        return view('admin.rent.raw', ['rent_raws' => $rent_raws]);
    }
    
    public function select(Request $request){
        $this->_authorization('admin', 'rent', 'select');

        $query = DB::table('rent')->where('rent_status', 2);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        $rent_selects = $query->get();
        return view('admin.rent.select', ['rent_selects' => $rent_selects, 'house' => $this->_house]);
    }
    
    public function sold(Request $request){
        $this->_authorization('admin', 'rent', 'sold');

        $query = DB::table('rent')->whereIn('rent_status', [4, 5]);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        if( !empty( $request->rent_style ) ){
            $query->where( 'rent_style', 'LIKE', '%'.$request->rent_style.'%' );
        }

        if( !empty( $request->rent_status ) ){
            $query->where( 'rent_status', 'LIKE', '%'.$request->rent_status.'%' );
        }

        $rent_solds = $query->get();
        return view('admin.rent.sold', ['rent_solds' => $rent_solds, 'house' => $this->_house]);
    }
    
    public function add(Request $request){
        $this->_authorization('admin', 'rent', 'add');
        return view('admin.rent.add');
    }

    public function store(Request $request){
        $this->_authorization('admin', 'rent', 'add');

        $this->_rent->store($request);

        if( $request->rent_status == 1 ){
            return redirect()->route('admin.rent.raw')->with('success', $this->_message['update']);
        }
        
        if( $request->rent_status == 2 ){
            return redirect()->route('admin.rent.select')->with('success', $this->_message['update']);
        }

        return redirect()->back()->with('success', $this->_message['store']);
    }

    public function edit(Request $request){
        $this->_authorization('admin', 'rent', 'edit');
        $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
        return view('admin.rent.edit', ['rent' => $rent, 'house' => $this->_house]);
    }

    public function update(Request $request){
        $this->_authorization('admin', 'rent', 'edit');
        $this->_rent->update($request);

        if( $request->rent_status == 1 ){
            return redirect()->route('admin.rent.raw')->with('success', $this->_message['update']);
        }
        
        if( $request->rent_status == 2 ){
            return redirect()->route('admin.rent.select')->with('success', $this->_message['update']);
        }

        if( $request->rent_status == 3 ){
            return redirect()->route('admin.renttran.index')->with('success', $this->_message['update']);
        }

        if( in_array( $request->rent_status, [4,5] ) ){
            return redirect()->route('admin.rent.sold')->with('success', $this->_message['update']);
        }

        return redirect()->back()->with('success', $this->_message['update']);
    }

    public function delete(Request $request){
        $this->_authorization('admin', 'rent', 'delete');

        File::deleteDirectory($this->_getuploadpath('rent', $request->rent_id));
        DB::table('rent')->where('rent_id',$request->rent_id)->delete();

        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!'); 
    }

    public function status(Request $request){
        $this->_authorization('admin', 'rent', 'status');
        DB::table('rent')->where('rent_id', $request->rent_id)->update([
            'rent_status' => $request->rent_status
        ]);
        return redirect()->back()->with('success', $this->_message['update']);
    }
}
