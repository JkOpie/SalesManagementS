<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\Stock;
use App\Sales;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = Product::all();
        $i = 0;
        $all = Product::all()->count();
        $hp = Product::orderBy('price', 'desc')->first();
        $q = Product::orderBy('quantity', 'desc')->first();
        
        return view('product')
        ->with('product', $product)
        ->with('i', $i)
        ->with('all', $all)
        ->with('hp', $hp)
        ->with('q', $q);
        
    }

    public function store(Request $request){

      
        $Validated = request()->validate([
            'product_name' => 'required',
            'price' => 'required',
            'sales_price' => 'required',
            'profit' => 'required',
            'quantity' => 'required',
        ]);

        $f = Product::create($Validated);

        if($f){
            $name = Product::where('product_name', '=', $request->product_name)->first();
        
            Stock::create([
                'product_id' => $name->id,
                'quantity' => $request->quantity,
                'time' => Carbon::now()->toDateString(),
                'categories' => 'add_stock', 
            ]);
        }

       return response()->json([
            'success' => 'Product added successfully!'
        ]);
    }

    public function update(Request $request){
  
        $Validated = request()->validate([
            'id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'sales_price' => 'required',
            'profit' => 'required',
            'quantity' => 'required',
            
        ]);

        Product::where('id','=', $request->id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'sales_price' => $request->sales_price,
            'profit' => $request->profit,
            'quantity' => $request->quantity,
        ]);
        return redirect('/product');
    }

    public function delete($id){
         
        $delete_stock = Stock::where("product_id", '=', $id)->delete();
        $delete = Product::find($id)->delete($id);

        return response()->json([
            'success' => 'Product deleted successfully!'
        ]);
        
    }

    public function add_stock(Request $request){

        $add_stock = Product::find($request->id);
        $add_stock->quantity += $request->quantity;
        $add_stock->save();

        Stock::create([
            'product_id' => $add_stock->id,
            'quantity' => $request->quantity,
            'time' => Carbon::now()->toDateString(),
            'categories' => 'add_stock',
        ]);

        return response()->json([
            'success' => 'Stock added successfully!'
        ]);
    }
}
