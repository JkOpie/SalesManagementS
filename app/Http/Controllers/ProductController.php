<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\Stock;
use App\Sales;
use App\Cart;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = Product::all();
        $i = 0; $total_revenue =0; $total_quantity = 0;
        $all = Product::all()->count();

        foreach( $product as  $p){
            $total_revenue = $total_revenue + ($p->price * $p->quantity);
            $total_quantity = $total_quantity + $p->quantity;
        }

        return view('product')
        ->with('product', $product)
        ->with('i', $i)
        ->with('all', $all)
        ->with('total', $total_revenue)
        ->with('total_quantity' , $total_quantity);

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

    public function edit($id){
        $edit = Product::where('id','=', $id)->first();
        return view('editproduct')->with('edit', $edit);
    }

    public function update($id, Request $request){
  
        $Validated = request()->validate([
            'product_name' => 'required',
            'price' => 'required',
            'sales_price' => 'required',
            'profit' => 'required',
            'quantity' => 'required',
            
        ]);

        $update = Product::where('id','=', $id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'sales_price' => $request->sales_price,
            'profit' => $request->profit,
            'quantity' => $request->quantity,
        ]);

        if($update){
            $this->sendResponse(null, 'Success');
        }else $this->sendError('error occurrs');
    }

    public function delete($id){
         
        $delete_stock = Stock::where("product_id", '=', $id)->delete();
        $delete = Product::find($id)->delete($id);
        $delete_cart = Cart::where("product_id", '=', $id)->delete();

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

    public function report(){
        $all = Product::all();
        $tq = 0;$total_revenue=0;

    

        foreach($all  as $alls){
            $tq = $tq + $alls->quantity;
            $total_revenue  += ($alls->price * $alls->quantity);
            
        }

        return view('report.productreport')->with('all', $all)->with('tq', $tq)->with('total_revenue', $total_revenue);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
    public function sendResponse($result , $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
}
