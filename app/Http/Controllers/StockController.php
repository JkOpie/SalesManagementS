<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Stock;
use App\Product;

class StockController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }

    public function index(){

        $all = Stock::orderBy('created_at', 'desc')->paginate(15);
        $pro_name = Product::all();

        return view('stock')->with('all', $all)
        ->with('pro_name', $pro_name);
    }

    public function store(Request $request){

        $count = count($request->input('quantity'));

        for ($i = 0; $i < $count; $i++) {

            $stock = Product::where('id','=',$request->product_id[$i])->first();

            if( 0 > $stock->id){

                $stock->quantity -= $request->quantity[$i];
                $stock->save();

                $create = Stock::create([
                    'product_id' => $request->product_id[$i],
                    'quantity' => $request->quantity[$i],
                    'time' => Carbon::now()->toDateString(),
                    'categories' => 'sales',
                    
                ]);
            }else{
                return response()->json([
                    'error' => 'product quantity is not enough successfully!'
                ]);
            }
        }
        
        return response()->json([
            'success' => 'Stock added successfully!'
        ]);
        
    }

    public function delete($id, Request $request){

        $minus = Product::where("id", '=', $id)->first();
        $minus->quantity -= $request->quantity;
        $minus->save();

        $delete = Stock::where('id', '=',  $request->stock_id)->delete();

        return response()->json([
            'success' => 'Stock deleted successfully!'
        ]);
    }
}
