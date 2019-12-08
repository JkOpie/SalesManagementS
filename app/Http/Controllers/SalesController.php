<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }

    public function show($id){
        $sales= Sales::where('invoice_id', '=',$id)->get();
        $i = 0;
        return view('sales')
        ->with('sales', $sales)
        ->with('i', $i);
    }
}
