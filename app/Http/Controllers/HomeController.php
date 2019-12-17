<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\Charts\ExampleChart;
use App\Invoice;
use App\Product;
use App\Stock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   


        $invoice = Invoice::all();
        $invoice_count = Invoice::all()->count();
        $total_revenue = 0; $total_quantity =0; $total_price =0;
        foreach( $invoice as  $p){
            $total_revenue += ($p->price * $p->quantity);
            $total_quantity += $p->quantity;
            $total_price  += $p->TPrice ;
        }


        $product = Product::all();
        $product_count = Product::all()->count();
    
        $total_product_sell = 0;$total_quantity_sell =0; $total_price_sell =0;

        foreach($invoice as $i){
            $total_product_sell += $i->TProduct;
            $total_quantity_sell += $i->TQuantity;
        }   $total_price_sell += $i->TPrice;
        

        $chart = new SampleChart;

        $chart->labels(['Total', 'Quantity', 'Total Price', 'Four']);

        $chart->dataset('Invoice', 'line', [ $invoice_count, $total_quantity, $total_price, $product_count])
        ->color("rgba(255, 205, 86, 132)")
        ->backgroundcolor("rgb(255, 99, 132)")
        ->linetension(0.2)
        ->fill(false);
        

        $chart->dataset('Product', 'line', [ $total_product_sell, $total_quantity_sell,$total_price_sell , $total_revenue])
        ->color("rgb(255, 99, 132)")
        ->backgroundcolor("rgb(255, 99, 132)")
        ->linetension(0.2)
        ->fill(false);

        $stock = Stock::all();
        $inven = new ExampleChart;

        $data = Stock::all();

        foreach($data  as $d){
            $c[] = $d->time;
            $e[] = $d->quantity;
        }

        //return $e;
     
        $inven->labels($c);


        $inven->dataset('Inventory', 'line', ($e))
        ->color( "#5DADE2")
        ->backgroundcolor("#5DADE2")
        ->linetension(0.2)
        ->fill(false);
       

        return view('home' ,compact('chart', 'inven'));
    }
}
