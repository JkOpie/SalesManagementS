@extends('layouts.app')

@section('content')

<div style="width:95%">
    <div class="alert alert-danger position-static" role="alert">
        If you want to add stock, please click <a href="/product" class="href">here</a>
    </div>
    <div class="data_wrapper">

    @if (count($all) > 1)
        <div class="text-right" style="padding-bottom: 3%">
            <div class="row">
                <div class="col-4 text-left">
                    <input type="text" placeholder="Search by Product Name" class="form-control text-center" id="myInput"
                        onkeyup="myFunction()">
                </div>
                <div class="col-4">
    
                </div>
                <div class="col-4">
                    <button class="btn bg-purple" onclick="popupwindow('/stock/report', 'popupwindow', '1000', '800')"> Report</button>
                </div>
            </div>
        </div>
    
        <table id="myTable" class="table table-hover  text-center bg-white" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Time</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $alls)
                <tr>
                    
                    <td>
                        {{$alls->products['product_name']}}
                      
                    </td>
                    <td>{{$alls->quantity}}</td>
                    <td>{{$alls->time}}</td>
                    <td>{{$alls->categories}}</td>
                <td>
                    <form id="stock_delete" method="post" action="/stock/{{$alls->product_id}}">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{$alls->quantity}}" name="quantity">
                        <input type="hidden" value="{{$alls->id}}" name="stock_id">
                        <button class="btn btn-danger stock_delete" type="submit">
                        <i class="fas fa-trash-alt"></i></button>
                    </form>
                    
                </td>
                </tr>
                @endforeach
    
            </tbody>
        </table>

        @else
       <h1>Empty Inventory!</h1>
       @endif
    </div>
</div>


@endsection