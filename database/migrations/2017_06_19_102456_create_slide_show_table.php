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
        Schema::create('slide_show', function(Blueprint $table){
            $table->increments('id')->comment('轮播图id');
            $table->string('images')->comment('轮播图图片地址');
            $table->string('url')->nullable()->comment('轮播图网址');
            $table->tinyInteger('status')->default(0)->comment('状态');
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
        Schema::drop('slide_show');
    }
}
