<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail', function(Blueprint $table){
            $table->integer('p_id')->comment('商品id');
            $table->string('summary')->nullable()->comment('商品简介');
            $table->string('remind_title')->nullable()->comment('商品简介前活动提醒');
            $table->text('description')->nullabled()->comment('商品详情排版');
            $table->timestamps();
            $table->primary('p_id');
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
        Schema::drop('product_detail');
    }
}
