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
            $table->integer('p_id')->unique()->comment('商品id');
            $table->string('p_index_image')->comment('商品封面图片');
            $table->string('summary')->comment('商品简介');
            $table->string('description')->comment('商品详情');
            $table->string('remind_title')->comment('商品简介前活动提醒');
            $table->integer('store')->index()->default(0)->comment('商品库存');
            $table->integer('sell_num')->index()->default(0)->comment('商品成交量');
            $table->integer('click_num')->index()->default(0)->commnet('商品点击量');
            $table->string('unit',10)->default('件')->comment('商品单位');
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
