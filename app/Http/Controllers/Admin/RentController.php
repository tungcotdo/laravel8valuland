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

class RentController extends Controller
{
    public function raw(Request $request){
        $this->_authorization(6);
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
        $this->_authorization(7);
        $query = DB::table('rent')->where('rent_status', 2);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        $rent_selects = $query->get();
        return view('admin.rent.select', ['rent_selects' => $rent_selects, 'house' => new HouseService]);
    }
    public function sold(Request $request){
        $this->_authorization(7);
        $query = DB::table('rent')->where('rent_status', 4);

        if( !empty( $request->code ) ){
            $query->where( 'code', 'LIKE', '%'.$request->code.'%' );
        }

        $rent_solds = $query->get();
        return view('admin.rent.sold', ['rent_solds' => $rent_solds, 'house' => new HouseService]);
    }
    public function transaction(Request $request){
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
        return view('admin.renttran.index', ['rent_transactions' => $rent_transactions]);
    }
    
    public function add(Request $request){
        return view('admin.rent.add');
    }

    public function edit(Request $request){
        $this->_authorization(20);
        $rent = DB::table('rent')->where('rent_id', $request->rent_id)->first();
        return view('admin.rent.edit', ['rent' => $rent, 'house' => new HouseService]);
    }
    public function store(Request $request){
        $this->_authorization(20);
        //Required fields to select list
        $flag = array_filter([
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'rent_style' => $request->rent_style,
            'rent_direction' => $request->rent_direction,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
            'rent_navigable_area' => $request->rent_navigable_area,
            'rent_price' => $request->rent_price
        ], function ($a) { 
            return $a == null;
        });

        $rent_status = empty($flag) ? 2 : 1;

        DB::table('rent')->where('rent_id', $request->rent_id)->update([
            'rent_status' => $rent_status,
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_email' => $request->owner_email,
            'rent_subdivision' => $request->rent_subdivision,
            'rent_building' => $request->rent_building,
            'rent_floor' => $request->rent_floor,
            'rent_style' => $request->rent_style,
            'rent_room' => $request->rent_room,
            'rent_direction' => $request->rent_direction,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
            'rent_navigable_area' => $request->rent_navigable_area,
            'rent_price' => $request->rent_price,
            'rent_description' => $request->rent_description,
            'rent_deposit' => $request->rent_deposit,
            'rent_deposit_date' => $request->rent_deposit_date,
            'rent_contract_date' => $request->rent_contract_date,
            'rent_broker' => $request->rent_broker,
            'rent_legal_person' => $request->rent_legal_person,
            'rent_contract_img' => $request->rent_contract_img,
            'rent_style' => $request->rent_style,
            'rent_created_by'  => Auth::user()->email,
            'rent_updated_by'  => Auth::user()->email,
            'rent_created_at'  => Carbon::now(),
            'rent_updated_at'  => Carbon::now()
        ]);

        if( $request->rent_status == 1 ){
            return redirect()->route('admin.rent.raw')->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
        }elseif( $request->rent_status == 2 ){
            return redirect()->route('admin.rent.select')->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
        }
        return redirect()->back()->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
    }
    public function update(Request $request){
        $this->_authorization(20);
        //Required fields to select list
        $flag = array_filter([
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'rent_style' => $request->rent_style,
            'rent_direction' => $request->rent_direction,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
            'rent_navigable_area' => $request->rent_navigable_area,
            'rent_price' => $request->rent_price
        ], function ($a) { 
            return $a == null;
        });

        $rent_status = empty($flag) ? 2 : 1;

        DB::table('rent')->where('rent_id', $request->rent_id)->update([
            'rent_status' => $rent_status,
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'owner_email' => $request->owner_email,
            'rent_subdivision' => $request->rent_subdivision,
            'rent_building' => $request->rent_building,
            'rent_floor' => $request->rent_floor,
            'rent_style' => $request->rent_style,
            'rent_room' => $request->rent_room,
            'rent_direction' => $request->rent_direction,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
            'rent_navigable_area' => $request->rent_navigable_area,
            'rent_price' => $request->rent_price,
            'rent_description' => $request->rent_description,
            'rent_deposit' => $request->rent_deposit,
            'rent_deposit_date' => $request->rent_deposit_date,
            'rent_contract_date' => $request->rent_contract_date,
            'rent_broker' => $request->rent_broker,
            'rent_legal_person' => $request->rent_legal_person,
            'rent_contract_img' => $request->rent_contract_img,
            'rent_style' => $request->rent_style,
            'rent_created_by'  => Auth::user()->email,
            'rent_updated_by'  => Auth::user()->email,
            'rent_created_at'  => Carbon::now(),
            'rent_updated_at'  => Carbon::now()
        ]);

        if( $request->rent_status == 1 ){
            return redirect()->route('admin.rent.raw')->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
        }elseif( $request->rent_status == 2 ){
            return redirect()->route('admin.rent.select')->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
        }
        return redirect()->back()->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
    }
    public function delete(Request $request){
        $this->_authorization(21);
        DB::table('rent')->where('rent_id',$request->rent_id)->delete();
        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!'); 
    }
    public function status(Request $request){
        $this->_authorization(20);
        DB::table('rent')->where('rent_id', $request->rent_id)->update([
            'rent_status' => $request->rent_status
        ]);
        return redirect()->back()->with('success', 'Cập nhật dữ liệu danh sách bán thành công!');
    }
}
