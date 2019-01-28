<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMixPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_products', function (Blueprint $table) { // dchange database name mix_packages to mix_products (edit direct database not migrate command)
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('branch_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('mix_packages');
    }
}
