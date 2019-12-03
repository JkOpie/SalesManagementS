@extends('layouts.app')

@section('content')
<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
            <div class="data_wrapper">
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
                                    <button type="submit" class="btn btn-danger">Delete</a>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection