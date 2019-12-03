<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Carbon\Carbon;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Cart::all();
        $i = 0;
        return view('cart')->with('all', $all)->with('i', $i);
    }

    public function store(Request $request){
        
        $Validated = request()->validate([
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'max_quantity' => 'required',
            'total_price' => 'required',
        ]);

        $p = Product::where('id', '=', $request->product_id)->first();
        $p->quantity -= $request->quantity;
        $p->save();


        $create = Cart::create([
            'product_id' => $request->product_id,
            'price' =>  $request->price,
            'quantity' =>  $request->quantity,
            'total_price' => $request->total_price,
        ]);

        return redirect('/product');

    }

    public function delete($id){

        $delete = Cart::find($id)->delete();

        if($delete){
            return redirect('/cart');
        }
    }


}
