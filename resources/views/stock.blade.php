@extends('layouts.app')

@section('content')

<div style="width:95%">
    <div class="alert alert-danger position-static" role="alert">
        If you want to add stock, please click <a href="/product" class="href">here</a>
    </div>
    <div class="data_wrapper">
        <div class="text-right" style="padding-bottom: 3%">
            <div class="row">
                <div class="col-4 text-left">
                    <input type="text" placeholder="Search by Product Name" class="form-control text-center" id="myInput"
                        onkeyup="myFunction()">
                </div>
                <div class="col-4">
    
                </div>
                <div class="col-4">
                    <a class="btn" style="background:#3421C0;color:#fff" href="/cart"><i class="fas fa-plus" style="padding-right:10px"></i> Sales</a>
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
                    
                    <td>{{$alls->product_id}}</td>
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
       
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="sales" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="editform" method="post" action="{{route('add_stock')}}">
                        @csrf
                        @foreach ($pro_name as $pn)
                        <div class="form-group row after-add-more control-group">
                            <label class="col-sm-2 col-form-label text-right">Product Name:</label>
                            <div class="col-sm-3">
                                <input type="text"  class="form-control" value="{{$pn->id}}" name="product_id[]"></option>
                            </div> 

                            <label class="col-sm-2 col-form-label text-right"> Price: RM</label>
                            <div class="col-sm-2">
                                <input type="number" readonly class="form-control" value="{{$pn->sales_price}}" >
                            </div>
                           
                            
                            <label class="col-sm-1 col-form-label text-right">Quantity: </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" required name="quantity[]" value="0">
                            </div>
                            
                        </div>
                        @endforeach
                        <hr>
                        <div class="row">
                            <label class="col-sm-2 col-form-label text-right">Total Sales:</label>
                            <div class="col-sm-2">
                            <input type="number" readonly class="form-control" value="" >
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary " value="Save Change"> Submit</button>
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