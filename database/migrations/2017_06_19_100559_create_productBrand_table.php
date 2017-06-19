<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productBrand', function(Blueprint $table){
            $table->increments('id')->comment('商品品牌id');
            $table->string('brand_name')->comment('品牌名称');
            $table->string('brand_logo')->comment('品牌logo路径');
            $table->string('brand_url')->comment('品牌网址');
            $table->string('brand_desc')->comment('品牌简介');
            $table->tinyInteger('sort')->comment('排序');
            $table->integer('cid')->comment('所属分类');
            $table->tinyInteger('is_hot')->default(1)->comment('是否推荐,0为推荐,1为不推荐');
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
        Schema::drop('productBrand');
    }
}
