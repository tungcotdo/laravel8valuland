<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function index(){
        return view('web.sale.index');
    }
}
