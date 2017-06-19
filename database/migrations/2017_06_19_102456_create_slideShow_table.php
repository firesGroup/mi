<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideShow', function(Blueprint $table){
            $table->increments('id')->comment('轮播图id');
            $table->string('images')->comment('轮播图图片地址');
            $table->string('url')->comment('轮播图网址');
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
        Schema::drop('slideShow');
    }
}
