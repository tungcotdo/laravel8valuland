<?php

namespace App\Services;
use Illuminate\Http\Request;
use File;
use DB;

class OwnerService
{
    public function arrange(){
        
        $telesale_query = DB::table('users')->where('user_group_id', 3);

        $telesale_number = $telesale_query->count();

        $telesales = $telesale_query->get();

        $owner_query = DB::table('owner');

        $owners = DB::table('owner')->get();

        $owner_number = $owner_query->count();

        if( !empty( $telesale_number ) && !empty( $owner_number ) ){
            $break = round( $owner_number / $telesale_number );

            foreach( $telesales as $ktelesale => $vtelesale ){
                $index = $ktelesale + 1;
                if( $index == 2 ){
                    $telesale_s = $index == 1 ? $index : (($index - 1) * $break);
                    $telesale_e = $index * $break;
                    DB::table('owner')
                    ->whereBetween('owner_id', [$telesale_s, $telesale_e])
                    ->update([
                        'user_id' => $vtelesale->id
                    ]);
                }
            }
        }

    }
}