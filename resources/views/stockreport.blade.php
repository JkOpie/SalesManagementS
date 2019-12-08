@extends('layouts.report')

@section('title')
<div class="col-md-12">
        <h1 class="title"> Inventory Report</h1>
    </div>
@endsection
    
@section('report_content')

<div class="col-md-8 text-right">

</div>
<div class="col-md-4 text-right">
    <table id="" class="table table-hover table-bordered text-center bg-white" style="width:100%">
        <tr>
            <th>Total Quantity</th>
        <td>{{$tq}}</td>
        </tr>
    </table>
</div>
<div class="col-md-12">
    <table id="" class="table table-hover table-bordered text-center bg-white" style="width:100%">
        <thead>
            <tr>

                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Time</th>
                <th scope="col">Categories</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($all as $in)
            <tr>

                <td>{{$in->product_id}}</td>
                <td>{{$in->quantity}}</td>
                <td>{{$in->time}}</td>
                <td> {{$in->categories}}</td>
              

            </tr>
            @endforeach

        </tbody>
    </table>
</div>



@endsection
