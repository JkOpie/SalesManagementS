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
            $table->string('Product_id');
            $table->string('Price');
            $table->string('Quantity');
            $table->bigInteger('Invoice_id')->unsigned()->index()->nullable();
            $table->foreign('Invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->timestamps();
         
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
