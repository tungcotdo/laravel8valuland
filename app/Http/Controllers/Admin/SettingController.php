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

class SettingController extends Controller
{
    public function update(Request $request){

        $this->_authorization('admin', 'notification', 'add');
        DB::table('setting')->where('key', 'rent_deadline_date')->update([
            'value' => $request->rent_deadline_date
        ]);
        return redirect()->back()->with('success', $this->_message['update']);
    }
}
