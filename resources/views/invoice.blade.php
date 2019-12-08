@extends('layouts.app')

@section('content')
<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
            <div class="data_wrapper">

                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary bg-purple"
                            style="margin-bottom:2em;">Print</button>
                    </div>
                </div>
                <table id="" class="table table-hover text-center bg-white" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cust Name</th>
                            <th scope="col">Cust Address</th>
                            <th scope="col">Total Product</th>
                            <th scope="col">Total Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice as $in)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$in->CustName}}</td>
                            <td>{{$in->CustAdd}}</td>
                            <td>{{$in->TProduct}}</td>
                            <td> {{$in->TQuantity}}</td>
                            <td>RM {{$in->TPrice}}</td>
                            <td>RM {{$in->Payment}}</td>
                            <td>RM {{$in->Balance}}</td>
                            <td>{{$in->Time}}</td>
                            <td>
                                <a class="btn btn-primary text-white" href="/invoice/edit/{{$in->id}}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-secondary text-white" href="/sales/{{$in->id}}">  
                                    View Product</a>
                                <button type="submit" class="btn btn-danger invoicedelete" value="{{$in->id}}"><i
                                        class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach

                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
