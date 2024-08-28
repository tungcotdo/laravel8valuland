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

class SaleController extends Controller
{
    public function raw(Request $request){
        $this->_authorization(6);
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
        $this->_authorization(7);
        $query = DB::table('sale')->where('sale_status', 2);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        $sale_selects = $query->get();
        return view('admin.sale.select', ['sale_selects' => $sale_selects, 'house' => new House]);
    }
    
    public function sold(Request $request){
        $this->_authorization(7);
        $query = DB::table('sale')->where('sale_status', 4);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        $sale_solds = $query->get();
        return view('admin.sale.sold', ['sale_solds' => $sale_solds, 'house' => new House]);
    }
    
    public function add(Request $request){
        return view('admin.sale.add');
    }

    public function edit(Request $request){
        $this->_authorization(20);
        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        return view('admin.sale.edit', ['sale' => $sale, 'house' => new House]);
    }

    public function update(Request $request){
        $this->_authorization(20);
        //Required fields to select list
        $flag = array_filter([
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'sale_style' => $request->sale_style,
            'sale_direction' => $request->sale_direction,
            'sale_navigable_area' => $request->sale_navigable_area,
            'sale_price' => $request->sale_price
        ], function ($a) { 
            return $a == null;
        });

        $sale_status = empty($flag) ? 2 : 1;

        DB::table('sale')->where('sale_id', $request->sale_id)->update([
            'sale_status' => $sale_status,
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_email' => $request->owner_email,
            'sale_subdivision' => $request->sale_subdivision,
            'sale_building' => $request->sale_building,
            'sale_floor' => $request->sale_floor,
            'sale_style' => $request->sale_style,
            'sale_room' => $request->sale_room,
            'sale_direction' => $request->sale_direction,
            'sale_navigable_area' => $request->sale_navigable_area,
            'sale_price' => $request->sale_price,
            'sale_description' => $request->sale_description,
            'sale_deposit' => $request->sale_deposit,
            'sale_deposit_date' => $request->sale_deposit_date,
            'sale_contract_date' => $request->sale_contract_date,
            'sale_broker' => $request->sale_broker,
            'sale_legal_person' => $request->sale_legal_person,
            'sale_contract_img' => $request->sale_contract_img,
            'sale_style' => $request->sale_style,
            'sale_created_by'  => Auth::user()->email,
            'sale_updated_by'  => Auth::user()->email,
            'sale_created_at'  => Carbon::now(),
            'sale_updated_at'  => Carbon::now()
        ]);

        if( $request->sale_status == 1 ){
            return redirect()->route('admin.sale.raw')->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
        }elseif( $request->sale_status == 2 ){
            return redirect()->route('admin.sale.select')->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
        }
        return redirect()->back()->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
    }

    public function delete(Request $request){
        $this->_authorization(21);
        DB::table('sale')->where('sale_id',$request->sale_id)->delete();
        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!'); 
    }

    public function status(Request $request){
        $this->_authorization(20);
        DB::table('sale')->where('sale_id', $request->sale_id)->update([
            'sale_status' => $request->sale_status
        ]);
        return redirect()->back()->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
    }
}
