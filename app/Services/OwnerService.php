<?php

namespace App\Services;
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
            $break = $owner_number / $telesale_number;

            foreach( $telesales as $ktelesale => $vtelesale ){
                $index = $ktelesale + 1;

                $telesale_s = ($index - 1) * $break;
                $telesale_e = $index * $break;

                foreach( $owners as $kowner => $vowner ){
                    $kowner = $kowner + 1;
                    if( $kowner > $telesale_s && $kowner <= $telesale_e ){
                        DB::table('owner')
                        ->where('owner_id', $vowner->owner_id)
                        ->update([
                            'user_id' => $vtelesale->id,
                            'owner_demand' => 0
                        ]);
                    }
                }
            }
        }

    }
}