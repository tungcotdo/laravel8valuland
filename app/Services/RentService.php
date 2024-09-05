<?php

namespace App\Services;
use Illuminate\Http\Request;
use File;
use DB;
use Auth;
use Carbon\Carbon;

class RentService
{
    public function add( $request ){
        $required_flag = array_filter([
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'rent_style' => $request->rent_style,
            'rent_direction' => $request->rent_direction,
            'rent_navigable_area' => $request->rent_navigable_area,
            'rent_price' => $request->rent_price,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
        ], function ($required_field) { 
            return $required_field == null;
        });

        $rent_status = empty( $required_flag ) ? 2 : 1;

        DB::table('rent')->insert([
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
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
            'rent_created_by'  => Auth::user()->email,
            'rent_updated_by'  => Auth::user()->email,
            'rent_created_at'  => Carbon::now(),
            'rent_updated_at'  => Carbon::now()
        ]);
    }

    public function update($request){
        $required_flag = array_filter([
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'rent_style' => $request->rent_style,
            'rent_direction' => $request->rent_direction,
            'rent_navigable_area' => $request->rent_navigable_area,
            'rent_price' => $request->rent_price,
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
        ], function ($required_field) { 
            return $required_field == null;
        });

        $rent_status = empty( $required_flag ) ? 2 : 1;

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
            'rent_start_date' => $request->rent_start_date,
            'rent_end_date' => $request->rent_end_date,
            'rent_created_by'  => Auth::user()->email,
            'rent_updated_by'  => Auth::user()->email,
            'rent_created_at'  => Carbon::now(),
            'rent_updated_at'  => Carbon::now()
        ]);


    }
}