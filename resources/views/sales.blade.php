@extends('layouts.app')

@section('content')
<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
            <div class="data_wrapper">
                    <div class="row">
                            <div class="col-md-12 text-left">
                                <a class="btn btn-primary" href="/invoice"
                                    style="background:rgb(52, 33, 192);color:#fff;border-color:rgb(52, 33, 192);margin-bottom:2em;">back</a>
                            </div>
                        </div>

                    <table id="myTable" class="table table-hover  text-center bg-white" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity: </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sa)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$sa->product_name}}</td>
                                    <td>RM {{$sa->Price}}</td>
                                    <td>{{$sa->Quantity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>
@endsection