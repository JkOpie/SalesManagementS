@extends('layouts.app')

@section('content')
<div style="width:95%">


<div class="row" >
    <div class="col-3 position-static">
    </div>
    <div class="col-2 position-static">
        <div class="top_static">
            <h1 class="text-center text-white">Total Product</h1>
            <hr class="hr_white">
            <h1 class="text-center text-white">{{$all}}</h1>
        </div>
    </div>
    <div class="col-2 position-static">
        <div class="top_static">
            <h1 class="text-center text-white">Total Inventory <br> Revenue</h1>
            <hr class="hr_white">
            <h1 class="text-center text-white">RM {{$total}}</h1>
        </div>
    </div>
    <div class="col-2 position-static">
        <div class="top_static">
            <h1 class="text-center text-white">Total Quantity</h1>
            <hr class="hr_white">
        <h1 class="text-center text-white">{{$total_quantity}}</h1>
        </div>
    </div>
    <div class="col-3 position-static">

    </div>


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
                    <a class="btn bg-purple" style="background:#3421C0;color:#fff" 
                    onclick="popupwindow('/product/report', 'popupwindow', '1000', '800')"><i class="fas fa-file-invoice-dollar" style="padding-right:1em"></i>Report</a >
                    <button class="btn" style="background:#3421C0;color:#fff" data-toggle="modal" data-target="#addmodal"><i
                    class="fas fa-plus" style="padding-right:10px"></i> Product</button>
                       
            </div>
        </div>
    </div>

    <table id="myTable" class="table table-hover  text-center bg-white" style="width:100%">
        <thead>
            <tr>
                <th  scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Original Price</th>
                <th scope="col">Sales Price</th>
                <th scope="col">Profit</th>
                <th scope="col">Quantity: </th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $pros)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$pros->product_name}}</td>
                <td>RM {{$pros->price}}</td>
                <td>RM {{$pros->sales_price}}</td>
                <td>RM {{$pros->profit}}</td>
                <td>{{$pros->quantity}}</td>
                <td>
                    <a class="btn btn-primary" href="/product/edit/{{$pros->id}}"><i class="fas fa-edit"></i></a>
                    <button class="btn btn-danger deletebtn" value="{{$pros->id}}"><i class="fas fa-trash-alt"></i></button>
                    <button class="btn btn-dark add_stock" value="{{$pros->id}}"><i class="fas fa-plus"></i> Stock</button>
                    <button class="btn btn-success"  data-toggle="modal"
                        data-target="#cart{{$pros->id}}"><i class="fas fa-shopping-cart" style="color: #fff"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
</div>
</div>

<!-- Modal -->
@foreach ($product as $pros)


<div class="modal fade" id="cart{{$pros->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add to Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addcartform" method="post" action="{{ route('add_cart') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Product Name:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control" name="product_name" value="{{$pros->product_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Sales Price:</label>
                        <div class="col-sm-8">
                            <input type="number" readonly class="form-control input_price" name="price" value="{{$pros->sales_price}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Max Quantity:</label>
                        <div class="col-sm-8">
                            <input type="number" readonly  class="form-control input_max_quantity" name="max_quantity" value="{{$pros->quantity}}" >
                        </div>
                    </div>
                    <div class="col-sm-12 text-right for_error">
                            <small style="color:red"> Product max quantity: {{$pros->quantity}} </small>
                        </div>

                    <div class="form-group row append_error">
                        <label class="col-sm-4 col-form-label text-right">Quantity:</label>
                        <div class="col-sm-8">
                            <input type="number"  class="form-control input_quantity" name="quantity"  >
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="product_id" value="{{$pros->id}}">

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
@endforeach

<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_product" action="{{ route('store_product') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Product Name:</label>
                        <div class="col-sm-8">
                            <input type="text"  id="input_product" class="form-control" name="product_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Price: </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="ap_price" name="price" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Sales Price: </label>
                        <div class="col-sm-8">
                            <input type="number"  class="form-control" id="ap_sales" name="sales_price" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Profit: </label>
                        <div class="col-sm-8">
                            <input type="number" readonly  class="form-control" id="ap_profit" name="profit" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Quantity: </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="quantity" >
                        </div>
                    </div>

                    <div class="text-right">
                        <input type="submit"  class="btn btn-primary " value="Submit">
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
