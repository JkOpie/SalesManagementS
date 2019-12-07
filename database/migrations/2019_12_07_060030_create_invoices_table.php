<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ReceiptNum')->nullable();
            $table->string('CustName')->nullable();
            $table->text('CustAdd')->nullable();
            $table->integer('TProduct')->nullable();
            $table->integer('TQuantity')->nullable();
            $table->integer('TPrice')->nullable();
            $table->integer('Payment')->nullable();
            $table->integer('Balance')->nullable();
            $table->string('Time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
