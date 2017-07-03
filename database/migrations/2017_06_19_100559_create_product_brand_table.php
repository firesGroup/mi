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
        Schema::create('product_brand', function(Blueprint $table){
            $table->increments('id')->comment('商品品牌id');
            $table->integer('category_id')->index()->comment('所属分类');
            $table->string('brand_name')->index()->comment('品牌名称');
            $table->string('brand_logo')->comment('品牌logo路径');
            $table->string('brand_url')->comment('品牌网址');
            $table->text('brand_desc')->comment('品牌简介');
            $table->tinyInteger('sort')->comment('排序');
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
        Schema::drop('product_brand');
    }
}
