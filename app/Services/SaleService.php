<?php

namespace App\Services;
use Illuminate\Http\Request;
use File;
use DB;

class SaleService
{
    public function add( $request ){
        //Required fields to select list
        $required_flag = array_filter([
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'sale_style' => $request->sale_style,
            'sale_direction' => $request->sale_direction,
            'sale_navigable_area' => $request->sale_navigable_area,
            'sale_price' => $request->sale_price
        ], function ($required_field) { 
            return $required_field == null;
        });

        $sale_status = empty( $required_flag ) ? 2 : 1;

        DB::table('sale')->insert([
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
    }

    public function update($request){
        
        //Required fields to select list
        $required_flag = array_filter([
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'sale_style' => $request->sale_style,
            'sale_direction' => $request->sale_direction,
            'sale_navigable_area' => $request->sale_navigable_area,
            'sale_price' => $request->sale_price
        ], function ($required_field) { 
            return $required_field == null;
        });

        $sale_status = empty( $required_flag ) ? 2 : 1;

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


    }
}