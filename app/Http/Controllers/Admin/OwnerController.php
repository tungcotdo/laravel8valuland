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

class OwnerController extends Controller
{
    public function index(Request $request){
        $this->_authorization(2);

        $query = DB::table('owner');

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

        $owners = $query->get();
        return view('admin.owner.index', ['owners' => $owners]);
    }

    public function add(Request $request){
        $this->_authorization(3);
        return view('admin.owner.add');
    }

    public function arrange(Request $request){

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

        return redirect()->back()->with('success', $this->_message['update']);

    }

    public function store(Request $request){
        $this->_authorization(3);
        DB::table('owner')->insert([
            'owner_name'  => $request['owner_name'],
            'owner_phone' => $request['owner_phone'],
            'owner_email' => $request['owner_email'],
            'owner_demand' => $request['owner_demand'],
            'code' => $request['code'],
            'owner_created_by'  => Auth::user()->email,
            'owner_updated_by'  => Auth::user()->email,
            'owner_created_at'  => Carbon::now(),
            'owner_updated_at'  => Carbon::now()
        ]);

        if( $request['owner_demand'] == 1 ){
            DB::table('sale')->insert([
                'sale_status' => 1,
                'owner_name'  => $request['owner_name'],
                'owner_phone' => $request['owner_phone'],
                'owner_email' => $request['owner_email'],
                'code'  => $request['code'],
                'sale_created_by'  => Auth::user()->email,
                'sale_updated_by'  => Auth::user()->email,
                'sale_created_at'  => Carbon::now(),
                'sale_updated_at'  => Carbon::now()
            ]);

            return redirect()->back()->with('success', $this->_message['store']);

        }elseif( $request['owner_demand'] == 2 ){
            DB::table('rent')->insert([
                'rent_status' => 1,
                'owner_name'  => $request['owner_name'],
                'owner_phone' => $request['owner_phone'],
                'owner_email' => $request['owner_email'],
                'code'  => $request['code'],
                'rent_created_by'  => Auth::user()->email,
                'rent_updated_by'  => Auth::user()->email,
                'rent_created_at'  => Carbon::now(),
                'rent_updated_at'  => Carbon::now()
            ]);

            return redirect()->back()->with('success', $this->_message['store']);
        }

        return redirect()->back()->with('success', $this->_message['store']); 
    }
    
    public function formUploadExcel(Request $request){
        $this->_authorization(3);
        return view('admin.owner.upload-excel');
    }
    public function uploadExcel(Request $request){
        $this->_authorization(3);
        if ( !$request->hasFile('owner_upload_excel') ) {
            return redirect()->back()->with('error', 'Chưa chọn file excel!');
        }

        $uploadFile = request()->file('owner_upload_excel');

        $excelData = Excel::toArray( new FileImport, $uploadFile );

        if( empty( $excelData[0] ) ){
            return redirect()->back()->with('error', 'File excel không có dữ liệu');  
        }   

        foreach( $excelData[0] as $key => $value ){
            DB::table('owner')->insert([
                'owner_name'  => $value['ten'],
                'owner_phone' => $value['sdt'],
                'owner_email' => $value['email'],
                'code'  => $value['macan'],
                'owner_created_by'  => Auth::user()->email,
                'owner_updated_by'  => Auth::user()->email,
                'owner_created_at'  => Carbon::now(),
                'owner_updated_at'  => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success', $this->_message['store']); 
    }
    public function edit(Request $request){
        $this->_authorization(4);
        $owner = DB::table('owner')->where('owner_id', $request->owner_id)->first();
        return view('admin.owner.edit', ['owner' => $owner]);
    }
    public function update(Request $request){
        $this->_authorization(4);
        DB::table('owner')->where('owner_id', $request->owner_id)->update([
            'owner_name'  => $request['owner_name'],
            'owner_phone' => $request['owner_phone'],
            'owner_email' => $request['owner_email'],
            'owner_demand' => $request['owner_demand'],
            'code' => $request['code'],
            'owner_created_by'  => Auth::user()->email,
            'owner_updated_by'  => Auth::user()->email,
            'owner_created_at'  => Carbon::now(),
            'owner_updated_at'  => Carbon::now()
        ]);

        if( $request['owner_demand'] == 1 ){
            DB::table('sale')->insert([
                'sale_status' => 1,
                'owner_name'  => $request['owner_name'],
                'owner_phone' => $request['owner_phone'],
                'owner_email' => $request['owner_email'],
                'code'  => $request['code'],
                'sale_created_by'  => Auth::user()->email,
                'sale_updated_by'  => Auth::user()->email,
                'sale_created_at'  => Carbon::now(),
                'sale_updated_at'  => Carbon::now()
            ]);

            return redirect()->back()->with('success', $this->_message['update']);

        }elseif( $request['owner_demand'] == 2 ){
            DB::table('rent')->insert([
                'rent_status' => 1,
                'owner_name'  => $request['owner_name'],
                'owner_phone' => $request['owner_phone'],
                'owner_email' => $request['owner_email'],
                'code'  => $request['code'],
                'rent_created_by'  => Auth::user()->email,
                'rent_updated_by'  => Auth::user()->email,
                'rent_created_at'  => Carbon::now(),
                'rent_updated_at'  => Carbon::now()
            ]);

            return redirect()->back()->with('success', $this->_message['store']);
        }

        return redirect()->back()->with('success', $this->_message['update']); 
    }

    public function updateDemand(Request $request){
        $this->_authorization(4);
        $owner = (array)DB::table('owner')->where('owner_id', $request->owner_id)->first();
        
        DB::table('owner')->where('owner_id', $request->owner_id)->update([
            'owner_name'  => $owner['owner_name'],
            'owner_phone' => $owner['owner_phone'],
            'owner_email' => $owner['owner_email'],
            'owner_demand' => $request['owner_demand'],
            'code' => $owner['code'],
            'owner_created_by'  => Auth::user()->email,
            'owner_updated_by'  => Auth::user()->email,
            'owner_created_at'  => Carbon::now(),
            'owner_updated_at'  => Carbon::now()
        ]);

        if( $request['owner_demand'] == 1 ){
            DB::table('sale')->insert([
                'sale_status' => 1,
                'owner_name'  => $owner['owner_name'],
                'owner_phone' => $owner['owner_phone'],
                'owner_email' => $owner['owner_email'],
                'code'  => $owner['code'],
                'sale_created_by'  => Auth::user()->email,
                'sale_updated_by'  => Auth::user()->email,
                'sale_created_at'  => Carbon::now(),
                'sale_updated_at'  => Carbon::now()
            ]);
            return redirect()->back()->with('success', $this->_message['store']);
        }elseif( $request['owner_demand'] == 2 ){
            DB::table('rent')->insert([
                'rent_status' => 1,
                'owner_name'  => $owner['owner_name'],
                'owner_phone' => $owner['owner_phone'],
                'owner_email' => $owner['owner_email'],
                'code'  => $owner['code'],
                'rent_created_by'  => Auth::user()->email,
                'rent_updated_by'  => Auth::user()->email,
                'rent_created_at'  => Carbon::now(),
                'rent_updated_at'  => Carbon::now()
            ]);
            return redirect()->back()->with('success', $this->_message['store']);
        }
    }

    public function delete(Request $request){
        $this->_authorization(5);
        DB::table('owner')->where('owner_id',$request->owner_id)->delete();
        return redirect()->route('admin.owner.index')->with('success', $this->_message['delete']); 
    }

    public function truncate(Request $request){
        $this->_authorization(5);
        DB::table('owner')->truncate();
        return redirect()->back()->with('success', $this->_message['delete']); 
    }
    
}
