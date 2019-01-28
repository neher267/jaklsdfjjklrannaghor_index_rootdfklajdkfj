<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('branch_id')->unsigned()->nullable();
            $table->string('name', 100)->unique();
            $table->longText('description')->nullable();
            $table->longText('informations')->nullable();
            $table->string('slug', 100);
            $table->string('unit', 10);
            $table->decimal('hit_count', 10,0)->default(0);
            $table->decimal('price', 6,2);
            $table->decimal('old_price', 6,2)->nullable();
            $table->boolean('for_sale'); //for sale or not
            $table->string('thumbnail', 50);
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
        Schema::dropIfExists('products');
    }
}
