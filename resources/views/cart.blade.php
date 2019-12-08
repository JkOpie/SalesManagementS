@extends('layouts.app')

@section('content')
<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                        if you want add product pls click <a href="/product" class="href">here</a>
                </div>
            <div class="data_wrapper">

            @if (count($all) > 1)
                
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" style="background:rgb(52, 33, 192);color:#fff;border-color:rgb(52, 33, 192);margin-bottom:2em;" 
                        data-toggle="modal" data-target="#checkout" >Checkout</button>
                    </div>
                </div>
                <table id="" class="table table-hover  text-center bg-white" style="width:100%">
                        <thead>
                            <tr>
                                <th  scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $alls)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$alls->product_id}}</td>
                                <td>RM {{$alls->price}}</td>
                                <td>{{$alls->quantity}}</td>
                                <td>RM {{$alls->total_price}}</td>

                                
                            <td><form  method="post" action="/cart/{{$alls->id}}">
                                @csrf
                                @method('delete')
                                    <input type="hidden" name="product_id" value="{{$alls->product_id}}">
                                    <input type="hidden" name="quantity" value="{{$alls->quantity}}">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </form>
                            </td>

                            </tr>
                            @endforeach

                            <tr>

                            </tr>
                        </tbody>
                </table>

                <hr>
                <div class="row">
                    <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                                <div class="form-group row">
                                        <label class="col-sm-7 col-form-label text-right">Total Quantity:</label>
                                        <div class="col-sm-5">
                                            <input type="text" readonly class="form-control text-right" name="total_quantity" value="{{$total_quantity}}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                            <label class="col-sm-7 col-form-label text-right">Grand Total Price:</label>
                                            <div class="col-sm-5">
                                            <input type="text" readonly class="form-control text-right" name="total_price" value="{{$total_price}}">
                                    </div>
                                </div>
                        </div>
                </div>

                @else
                <h1> Empty Cart!</h1>
                @endif

                
            </div>
        </div>
       
        
    </div>
</div>

<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="checkout" method="post" action="{{route('add_invoice')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label ">Customer Name :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="custname" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label ">Cust Address:</label>
                        <div class="col-sm-8">
                            <input type="text"  class="form-control" name="address" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Total Product :</label>
                        <div class="col-sm-8">
                            <input type="number" readonly class="form-control" name="total_product" value="{{$total_product}}">
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Total Quantity :</label>
                        <div class="col-sm-8">
                            <input type="number" readonly class="form-control" name="total_quantity" value="{{$total_quantity}}" >
                        </div>
                    </div>
                    
                  
                   
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Grand Total Price :</label>
                        <div class="col-sm-8">
                            <input type="number"  id="grand_total_price" readonly class="form-control" name="total_price" value="{{$total_price}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Payment :</label>
                        <div class="col-sm-8">
                            <input type="number"  id="payment" class="form-control" name="payment">
                        </div>
                        <label class="col-sm-4 col-form-label"></label>
                        <small id="passwordHelpBlock" class="col-sm-8 form-text text-muted">
                            Your payment must be higher than total price.
                          </small>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Balance :</label>
                        <div class="col-sm-8">
                            <input type="number" readonly id="balance" class="form-control" name="balance">
                        </div>
                    </div>


                    <div class="text-right">
                        <input type="submit" class="btn btn-primary " value="Submit">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection