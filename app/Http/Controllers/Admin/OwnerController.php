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
use App\Services\OwnerService;

class OwnerController extends Controller
{

    private $_owner;

    function __construct(){
        parent::__construct();
        $this->_owner = new OwnerService();
    }

    public function index(Request $request){
        $this->_authorization('admin', 'owner', 'index');

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

        if( !empty( $request->owner_telesale ) ){
            $query->where( 'user_id', $request->owner_telesale );
        }

        if( Auth::user()->user_group_id == 3 ){
            $query->where('user_id', Auth::user()->id);
        }

        $compact['owners'] = $query->where('owner_demand', 0)->get();

        $compact['telesales'] = DB::table('users')->where('user_group_id', 3)->get();

        return view('admin.owner.index', $compact);
    }

    public function add(Request $request){
        $this->_authorization('admin', 'owner', 'add');
        return view('admin.owner.add');
    }

    public function arrange(Request $request){
        $this->_authorization('admin', 'owner', 'orrange');
        $this->_owner->arrange();
        return redirect()->back()->with('success', $this->_message['update']);
    }

    public function store(Request $request){
        $this->_authorization('admin', 'owner', 'add');
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
        $this->_authorization('admin', 'owner', 'upload_excel');
        return view('admin.owner.upload-excel');
    }
    public function uploadExcel(Request $request){
        $this->_authorization('admin', 'owner', 'upload_excel');
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
        $this->_authorization('admin', 'owner', 'edit');
        $owner = DB::table('owner')->where('owner_id', $request->owner_id)->first();
        return view('admin.owner.edit', ['owner' => $owner]);
    }
    public function update(Request $request){
        $this->_authorization('admin', 'owner', 'edit');
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
        $this->_authorization('admin', 'owner', 'demand');
        $owner = (array)DB::table('owner')->where('owner_id', $request->owner_id)->first();
        DB::table('owner')->where('owner_id', $request->owner_id)->update([
            'owner_demand' => $request['owner_demand'],
            'owner_updated_by'  => Auth::user()->email,
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
        }

        return redirect()->back()->with('success', $this->_message['update']);
    }

    public function updateTelesale(Request $request){
        $this->_authorization('admin', 'owner', 'update_telesale');
        DB::table('owner')
        ->where('owner_id', $request->owner_id)
        ->update([
            'user_id'  => $request->user_id,
            'owner_updated_by'  => Auth::user()->email,
            'owner_updated_at'  => Carbon::now()
        ]);

        return redirect()->back()->with('success', $this->_message['update']);
    }

    public function delete(Request $request){
        $this->_authorization('admin', 'owner', 'delete');
        DB::table('owner')->where('owner_id',$request->owner_id)->delete();
        return redirect()->route('admin.owner.index')->with('success', $this->_message['delete']); 
    }

    public function truncate(Request $request){
        $this->_authorization('admin', 'owner', 'truncate');
        DB::table('owner')->truncate();
        return redirect()->back()->with('success', $this->_message['delete']); 
    }
    
}
