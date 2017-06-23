<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_model', function(Blueprint $table){
            $table->increments('id')->comment('模型id');
            $table->string('model_name')->unique()->comment('模型名称');
            $table->timestamps();
            $table->charset='utf8';
            $table->engine='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_model');
    }
}
