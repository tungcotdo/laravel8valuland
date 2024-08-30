<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Services\HouseService;
use App\Services\SaleService;

class SaleController extends Controller
{
    private $_sale;
    private $_house;

    function __constructor(){
        parent::__construct();
        $this->_sale = new SaleService();
        $this->_house = new HouseService();
    }

    public function select(Request $request){
        return view('web.sale.select');
    }

    public function add(Request $request){
        return view('web.sale.add');
    }

    public function store(Request $request){
        $this->_sale->store($request);
        return redirect()->route('web.sale.select')->with('success', $this->_message['store']);
    }

    public function edit(Request $request){
        $sale = DB::table('sale')->where('sale_id', $request->sale_id)->first();
        return view('web.sale.edit', ['sale' => $sale, 'house' => $this->_house]);
    }

    public function update(Request $request){
        $this->_sale->update($request);
        return redirect()->route('web.sale.select')->with('success', $this->_message['update']);
    }

    public function detail(Request $request){
        return view('web.sale.detail');
    }
}
