@extends('layouts.app')

@section('content')
<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
            <div class="data_wrapper">

                <div class="row">
                    <div class="col-4 text-left">
                            <input type="text" placeholder="Search by Product Name" class="form-control text-center" id="myInput"
                                onkeyup="myFunction()">
                        </div>
                        <div class="col-4 ">
                               
                            </div>
                    <div class="col-md-4 text-right">
                        <button class="btn btn-primary bg-purple"
                            style="margin-bottom:2em;" onclick="popupwindow('/invoice/pdf', 'popupwindow', '1000', '800')">Report</button>
                    </div>
                </div>
                <table id="myTable" class="table table-hover text-center bg-white" style="width:100%">
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
                                <button type="submit" class="btn btn-danger invoicedelete" value="{{$in->id}}"><i
                                    class="fas fa-trash-alt"></i></button>
                                <a class="btn btn-secondary text-white" href="/sales/{{$in->id}}">  
                                    <i class="fas fa-eye"></i> Product</a>

                                    <button type="button" class="btn btn-dark text-white" >Receipt</button>
                               
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
</div>

    @endsection
