@extends('layouts.receipt')


@section('title')
<div class="col-md-12">
    <h1 class="title"> Receipt </h1>
</div>
@endsection


@section('receipt_content')
<div class="col-md-12">
        <hr>
    </div>
<div class="col-md-12">
    <h3>Customer Info</h3>
</div>


<div class="col-md-12">
        <table class="table table-hover table-borderless text-center bg-white" style="width:100%">
                <tr>
                    <th scope="col" class="text-left">Name</th>
                    <td class="text_right">{{$r->CustName}}</td>
                </tr>
                <tr>
                    <th scope="col" class="text-left">Address</th>
                    <td class="text_right">{{$r->CustAdd}}</td>
                </tr>
                
        </table>


        <table class="table table-hover table-bordered text-center bg-white text-center" style="width:100%">
                <tr>
                    <th  scope="col" class=" bg-secondary text-white"> Item</th>
                    <th scope="col" class=" bg-secondary text-white"> Price </th>
                    <th scope="col" class=" bg-secondary text-white"> Quantity </th>
                    <th scope="col" class=" bg-secondary text-white"> Sub Total </th>
                </tr>

                @foreach ($sales as $saless)
                <tr>
                    <th scope="col">{{$saless->product_name}}</th>
                    <td>RM {{$saless->Price}}</td>
                    <td >{{$saless->Quantity}}</td>
                    <td >RM {{$saless->Price * $saless->Quantity}}</td>
                </tr>
                @endforeach
                <tr >
                  
                    <th scope="col" colspan="3" class="text-right">Total</th>
                    <td scope="col" class="bg-secondary text-white">RM {{$r->TPrice}}</td>
                    
                </tr>   
                <tr>
                    
                    
                    <th scope="col"  colspan="3" class="text-right">Payment</th>
                    <td scope="col" class="bg-secondary text-white">RM {{$r->Payment}}</td>
                    
                </tr>  
                <tr >
                   
                    <th scope="col"  colspan="3" class="text-right" style="border:none">Balance</th>
                    <td scope="col" class="bg-secondary text-white">RM {{$r->Balance}}</td>
                    
                </tr>  
        </table>

    </div>
    <div class="col-md-12">

            <hr>
    </div>


    <div class="col-md-6">
            <p class="legal"><strong>Thank you for your purchase!</strong> Date: {{$r->Time}}
            </p>
    </div>
@endsection




