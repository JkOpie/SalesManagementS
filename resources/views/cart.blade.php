@extends('layouts.app')

@section('content')
<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                        if you want add product pls click <a href="/product" class="href">here</a>
                </div>
            <div class="data_wrapper">
                   
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Receipt No.</label>
                            <input type="text" readonly class="form-control" name="receipt">
                        </div>
                        <div class="form-group">
                                <label>Customer Name:</label>
                                <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Customer Address</label>
                                <textarea name="address" id=""  rows="5" class="form-control "></textarea>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label >Receipt Date:</label>
                                <input type="date" readonly id="set_date" class="form-control date" name="date">
                            </div>
                            <div class="form-group">
                                    <label for="inputEmail4">Total Product:</label>
                                    <input type="number" readonly class="form-control" name="total_product" value="{{$total_product}}">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" style="background:rgb(52, 33, 192);color:#fff;border-color:rgb(52, 33, 192)">Clear All</button>
                        <button class="btn btn-primary" style="background:rgb(52, 33, 192);color:#fff;border-color:rgb(52, 33, 192)">Generate Receipt</button>
                    </div>

                </div>
                  
                            
                            
                          
                          
                <hr>
                
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
                        </tbody>
                </table>

                <hr>
                <div class="row">
                    <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                                <div class="form-group row">
                                        <label class="col-sm-7 col-form-label text-right">Grand Total Quantity:</label>
                                        <div class="col-sm-5">
                                            <input type="text" readonly class="form-control text-right" name="" value="{{$total_quantity}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-7 col-form-label text-right">Grand Total Price:</label>
                                            <div class="col-sm-5">
                                            <input type="text" readonly class="form-control text-right" name="" value="{{$total_price}}">
                                    </div>
                                </div>
                        </div>
                </div>
                
            </div>
        </div>
       
        
    </div>
</div>
@endsection