@extends('layouts.app')

@section('content')

<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
            <div class="data_wrapper">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <a  class="btn btn-primary bg-purple"
                            style="margin-bottom:2em;" href="/product">Back</a>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-2 text-left">
                            
                        </div>
                        <div class="col-md-8 text-left">
                            
                <form id="edit_product" method="post" action="/product/{{$edit->id}}">
                    @csrf
                    @method('put')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label >Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{$edit->product_name}}">
                            </div>
                            <div class="form-group col-md-6">
                                    <label >Original Price</label>
                            <input type="number" class="form-control ep_price" name="price" value="{{$edit->price}}" onkeyup="cp_op()">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label >Sales Price</label>
                                <input type="number" class="form-control ep_sales" name="sales_price" value="{{$edit->sales_price}}" onkeyup="cp_op()">
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Profit</label>
                            <input type="number" readonly class="form-control ep_profit" name="profit" value="{{$edit->profit}}" >
                            </div>
                            </div>
                        <hr>
    
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                    <label >Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{$edit->quantity}}">
                        </div>
                           <hr>
                        </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        
                                    </div>
                                <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-primary  bg-purple">Submit</button>
                                </div>
                                
                            </div>
                            
                    </form>
                        </div>
                            <div class="col-md-2 text-left">
                            
                                </div>
                </div>
                

            </div>
        </div>
    </div>
</div>

@endsection
