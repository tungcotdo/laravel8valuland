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

    public function store(Request $request){
        $this->_authorization(3);
        DB::table('owner')->insert([
            'owner_name'  => $request['owner_name'],
            'owner_phone' => $request['owner_phone'],
            'owner_email' => $request['owner_email'],
            'owner_demand' => $request['owner_demand'],
            'code'  => $request['code'],
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

            return redirect()->back()->with('success', 'Thêm dữ liệu vào danh sách bán thành công!');

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

            return redirect()->back()->with('success', 'Thêm dữ liệu vào danh sách cho thuê thành công!');
        }

        return redirect()->back()->with('success', 'Thêm dữ liệu vào danh sách chủ nhà thành công!'); 
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

        return redirect()->back()->with('success', 'Tải dữ liệu thành công!'); 
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

            return redirect()->back()->with('success', 'Thêm dữ liệu vào danh sách bán thành công!');

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

            return redirect()->back()->with('success', 'Thêm dữ liệu vào danh sách cho thuê thành công!');
        }

        return redirect()->back()->with('success', 'Sửa thông tin chủ nhà thành công!'); 
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
            return redirect()->back()->with('success', 'Thêm dữ liệu vào danh sách bán thành công!');
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
            return redirect()->back()->with('success', 'Thêm dữ liệu vào danh sách cho thuê thành công!');
        }
    }

    public function delete(Request $request){
        $this->_authorization(5);
        DB::table('owner')->where('owner_id',$request->owner_id)->delete();
        return redirect()->route('admin.owner.index')->with('success', 'Xoá dữ liệu thành công!'); 
    }

    public function truncate(Request $request){
        $this->_authorization(5);
        DB::table('owner')->truncate();
        return redirect()->back()->with('success', 'Xoá dữ liệu thành công!'); 
    }
    
}
