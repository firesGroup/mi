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
        Schema::create('productDetail', function(Blueprint $table){
            $table->integer('pid')->unique()->comment('商品id');
            $table->string('p_index_image')->comment('商品封面图片');
            $table->string('summary')->comment('商品简介');
            $table->string('description')->comment('商品详情');
            $table->string('remind_title')->comment('商品简介前活动提醒');
            $table->integer('store')->default(0)->comment('商品库存');
            $table->integer('sell_num')->default(0)->comment('商品成交量');
            $table->integer('click_num')->default(0)->commnet('商品点击量');
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
        Schema::drop('productDetail');
    }
}
