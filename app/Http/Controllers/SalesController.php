<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Invoice;
use App\Sales;
use App\Product;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }

    public function show($id){
        $sales = Invoice::find($id)->sales;

        $i = 0;
        return view('sales')
        ->with('sales', $sales)
        ->with('i', $i);
    }

    
    public function receipt($id){
        
        $receipt = Invoice::where('id', $id )->first();

        $sales =  Invoice::find($id)->sales;

        return view('receipt.receipt')
        ->with('r', $receipt)
        ->with('sales', $sales);
    }
}
