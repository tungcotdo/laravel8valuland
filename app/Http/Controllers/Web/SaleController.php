<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function select(Request $request){
        return view('web.sale.select');
    }

    public function add(Request $request){
        return view('web.sale.add');
    }

    public function detail(Request $request){
        return view('web.sale.detail');
    }
}
