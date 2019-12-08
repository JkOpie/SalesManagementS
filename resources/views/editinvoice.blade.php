@extends('layouts.app')

@section('content')

<div style="width:95%">
    <div class="row">
        <div class="col-md-12">
            <div class="data_wrapper">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <a  class="btn btn-primary bg-purple"
                            style="margin-bottom:2em;" href="/invoice">Back</a>
                    </div>
                    </div>

            <form id="edit_invoice" method="post" action="/invoice/{{$edit->id}}">
                @csrf
                @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Cust Name</label>
                        <input type="text" class="form-control" name="custname" value="{{$edit->CustName}}">
                        </div>
                        <div class="form-group col-md-6">
                                <label >Total Product</label>
                        <input type="number" class="form-control" readonly value="{{$edit->TProduct}}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                            <div class="form-group col-md-12">
                                    <label >Cust Address</label>
                            <textarea class="form-control" name="custaddress"  rows="5">{{$edit->CustAdd}}</textarea>
                            </div>
                        </div>
                        <hr>
                    <div class="form-row">
                      
                        <div class="form-group col-md-6">
                            <label >Total Quantity</label>
                        <input type="number" class="form-control"  readonly value="{{$edit->TQuantity}}">
                        </div>
                        <div class="form-group col-md-6">
                                <label>Total Price</label>
                        <input type="number" class="form-control edit_tp_invoice"  readonly value="{{$edit->TPrice}}">
                            </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Payment</label>
                        <input type="number" class="form-control edit_payment_invoice" name="payment" value="{{$edit->Payment}}" onkeyup="cal_balance_invoice()">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Balance</label>
                        <input type="number" class="form-control edit_balance_invoice" name="balance"  value="{{$edit->Balance}}">
                        </div>
                    </div>

                    <hr>
                        <div class="row">
                                <div class="col-md-6">
                                    
                                </div>
                            <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-primary  bg-purple">Submit</button>
                            </div>
                            
                        </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
