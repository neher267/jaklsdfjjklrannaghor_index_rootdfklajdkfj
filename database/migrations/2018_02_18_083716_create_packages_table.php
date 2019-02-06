<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packageable_id')->unsigned();
            $table->string('packageable_type', 30);
            $table->string('title');
            $table->string('bn_title')->nullable();
            $table->text('description');
            $table->text('bn_description')->nullable();
            $table->boolean('status')->default(true); 
            $table->string('thumbnail', 50);
            $table->decimal('hit_count', 10, 0)->unsigned()->default(0);
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
        Schema::dropIfExists('packages');
    }
}
