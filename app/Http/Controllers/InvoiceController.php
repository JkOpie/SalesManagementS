<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request){

        $Validated = request()->validate([
            'receiptno' => 'required',
            'custname' => 'required',
            'address' => 'required',
            'total_product' => 'required',
            'total_quantity' => 'required',
            'total_price' => 'required',
            'payment' => 'required',
        ]);


        if($request->payment > $request->total_price){
            $invoice = Invoice::create([
                'ReceiptNum' => $request->receiptno,
                'CustName' => $request->custname,
                'CustAdd' => $request->address,
                'TProduct' => $request->total_product,
                'TQuantity' => $request->total_quantity,
                'TPrice' => $request->total_price,
                'Payment' => $request->payment,
                'Time' => Carbon::now()->toDateString(),

            ]);

            $cart = Cart::all();

            foreach($cart as $carts){   

                echo($carts->product_id);

                $sales = Sales::create([
                    'Product_id' => $carts->product_id,
                    'Quantity' => $carts->quantity,
                    'Price' => $carts->price,
                    'Invoice_id' => $invoice->id,
                   
                ]);
            
               
            }   
            dd();         
            return $this->sendResponse(null, 'Success');
        
        }else{
            return $this->sendError('error occurrs');
        }  
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
