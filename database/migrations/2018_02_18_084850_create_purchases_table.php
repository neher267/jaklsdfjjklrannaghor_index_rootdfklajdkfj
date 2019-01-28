<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id')->unsigned();
            $table->integer('merchant_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->decimal('quantity',8,0);
            $table->decimal('deposit',8,0)->default(0);
            $table->decimal('tret',8,0)->default(0);
            $table->decimal('price',8,0);
            $table->boolean('update_stock')->default(false);
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
        Schema::dropIfExists('purchases');
    }
}
