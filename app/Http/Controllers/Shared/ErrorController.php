<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FileExport;
use App\Imports\FileImport;
use DB;
use Carbon\Carbon;
use Auth;
use App\Services\HouseService;
use Validator,Response,File,Route;

class ErrorController extends Controller
{
    function __construct(){
    }

    public function e404(Request $request){
        return view('error.404');
    }
    
}
