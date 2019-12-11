<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
  
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('Price');
            $table->string('Quantity');
            $table->bigInteger('invoice_id')->unsigned()->index()->nullable();
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->timestamps();
         
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
