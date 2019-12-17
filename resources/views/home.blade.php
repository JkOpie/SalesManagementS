@extends('layouts.app')

@section('content')

<div style="width:95%">
    <div class="row">
        <div class="col-md-6">
            <div class="data_wrapper">
                <div class="row">
                    <div class="col-md-7 text-left">
                        <h1>Dashboard </h1>
                    </div>
                    <div class="col-md-5 text-right">
                       <a class="btn bg-purple" type="submit" href="/product">To Product</a>
                    </div>
                </div>
                
                <div id="app">
                    {!! $chart->container() !!}
                </div>
               
            </div>
        </div>
        <div class="col-md-6">
            <div class="data_wrapper">
                <div class="row">
                    <div class="col-md-7 text-left">
                        <h1>Inventory </h1>
                    </div>
                    <div class="col-md-5 text-right">
                       <a class="btn bg-purple" type="submit" href="/stock">To Inventory</a>
                    </div>

                </div>

                    <div id="app">
                        {!! $inven->container() !!}
                    </div>
                
            </div>
        </div>
    </div>
</div>




       
@endsection

@section('bottom')
{!! $chart->script() !!}
{!! $inven->script() !!}
@endsection
