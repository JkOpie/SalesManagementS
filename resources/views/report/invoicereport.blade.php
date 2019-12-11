@extends('layouts.report')

@section('title')
<div class="col-md-12">
    <h1 class="title"> Sales Report</h1>
</div>
@endsection

@section('report_content')




<div class="col-md-8 text-right">

</div>
<div class="col-md-4 text-right">
    <table id="" class="table table-hover table-bordered text-center bg-white" style="width:100%">
        <tr>
            <th>Total Revenue</th>
            <td>RM </td>
        </tr>
        <tr>
            <th>Total Sales</th>
            <td>RM </td>
        </tr>
        <tr>
            <th>Total Profit</th>
            <td>RM</td>
        </tr>
    </table>
</div>
<div class="col-md-12">
    <table id="" class="table table-hover table-bordered text-center bg-white" style="width:100%">
        <thead>
            <tr>

                <th scope="col">Cust Name</th>
                <th scope="col">Cust Address</th>
                <th scope="col">Total Product</th>
                <th scope="col">Total Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Payment</th>
                <th scope="col">Balance</th>
                <th scope="col">Time</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($all as $in)
            <tr>

                <td>{{$in->CustName}}</td>
                <td>{{$in->CustAdd}}</td>
                <td>{{$in->TProduct}}</td>
                <td> {{$in->TQuantity}}</td>
                <td>RM {{$in->TPrice}}</td>
                <td>RM {{$in->Payment}}</td>
                <td>RM {{$in->Balance}}</td>
                <td>{{$in->Time}}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection
