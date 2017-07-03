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
            $table->string('p_index_image')->comment('商品封面图片');
            $table->string('summary')->comment('商品简介');
            $table->string('remind_title')->comment('商品简介前活动提醒');
            $table->text('description')->comment('商品详情');
            $table->tinyInteger('is_free_shipping')->default(0)->comment('是否包邮,默认包邮');
            $table->string('tags')->index()->default('')->comment('商品关键字');
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
