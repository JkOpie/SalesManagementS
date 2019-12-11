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
        $total_product = Cart::all()->count();
        $total_price = 0;
        $total_quantity = 0;


        foreach($all as $alls){
            $total_price = $total_price + $alls->total_price;
            $total_quantity = $total_quantity + $alls->quantity;
        }
        
        $i = 0;
        return view('cart')
        ->with('all', $all)
        ->with('i', $i)
        ->with('total_price',$total_price)
        ->with('total_quantity',$total_quantity)
        ->with('total_product', $total_product);
    }

    public function store(Request $request){
        
        $Validated = request()->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'max_quantity' => 'required',
        ]);

        $p = Product::where('id', '=', $request->product_id)->first();
        $p->quantity -= $request->quantity;
        $p->save();

        $total_price = $request->quantity * $request->price;


        $create = Cart::create([
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'price' =>  $request->price,
            'quantity' =>  $request->quantity,
            'total_price' => $total_price,
        ]);

        return redirect('/product');

    }

    public function delete($id,Request $request){

        $pro = Product::where('id', '=', $request->product_id)->first();
        $pro->quantity += $request->quantity;
        $pro->save();
        
        $delete = Cart::where('id', $id)->delete();

        if($delete){
            return redirect('/cart');
        }
    }

   


}
