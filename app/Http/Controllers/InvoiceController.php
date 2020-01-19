<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Invoice;
use App\Cart;
use App\Sales;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $invoice = Invoice::all();
        $i = 0;
        return view('invoice')->with('invoice', $invoice)->with('i', $i);
    }

    public function store(Request $request){

        $Validated = request()->validate([
            'custname' => 'required',
            'address' => 'required',
            'total_product' => 'required',
            'total_quantity' => 'required',
            'total_price' => 'required',
            'payment' => 'required',
            'balance' => 'required',
        ]);

        if($request->payment > $request->total_price){
            $invoice = Invoice::create([
                'CustName' => $request->custname,
                'CustAdd' => $request->address,
                'TProduct' => $request->total_product,
                'TQuantity' => $request->total_quantity,
                'TPrice' => $request->total_price,
                'Payment' => $request->payment,
                'Balance' => $request->balance,
                'Time' => Carbon::now()->toDateString(),
            ]);

        $cart = Cart::with('products')->get();

            foreach($cart as $carts){ 
                $sales = Sales::create([
                    'product_name' => $carts->products->product_name,
                    'Quantity' => $carts->quantity,
                    'Price' => $carts->price,
                    'invoice_id' => $invoice->id,
                ]);   
            }

            DB::table('carts')->delete();
                
            return $this->sendResponse(null, 'Success');
        
        }else{
            return $this->sendError('error occurrs');
        }  
    }

    public function edit($id){
        $edit = Invoice::where('id', '=', $id)->first();
        return view('editinvoice')->with('edit',$edit);
    }

    public function update($id,Request $request){

        $Validated = request()->validate([
            'custname' => 'required',
            'custaddress'=> 'required',
            'payment' => 'required',
            'balance' => 'required',
        ]);

        if($request->balance > 0){
            $invoice = Invoice::where('id', '=', $id )->update([
                'CustName' => $request->custname,
                'CustAdd'  => $request->custaddress,
                'Payment' => $request->payment,
                'Balance' => $request->balance,
            ]);

            return redirect('/invoice');
        }else return redirect('/invoice');

    }

    public function delete($id){

        //return $id;
        $invoice = Invoice::find($id);

        $invoice->sales->each->delete();
        $delete =  $invoice->delete();

        if($delete){
            $this->sendResponse(null, 'Success');
        }else $this->sendError('error occurrs');
    }

    public function display_pdf()
    {
        $all = Invoice::all();
        $revenue = Invoice::with('sales')->get();

        return view('report.invoicereport')->with('all', $all);
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
