<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'product', function(Blueprint $table){
            $table->increments('id')->comment('商品id');
            $table->integer('category_id')->index()->comment('分类id');
            $table->string('p_name')->unique()->comment('商品名称');
            $table->string('p_num',15)->index()->comment('商品货号,不填写自动生成');
            $table->integer('store')->index()->default(0)->comment('商品总库存');
            $table->integer('sell_num')->index()->default(0)->comment('商品成交量');
            $table->integer('click_num')->index()->default(0)->commnet('商品点击量');
            $table->tinyInteger('status')->default(0)->comment('商品状态:0为在售,1为下架,2为预购,3为缺货,4为新品上市');
            $table->tinyInteger('recommend')->default(1)->comment('是否推荐,默认1为不推荐,0为推荐');
            $table->timestamps();
            $table->charset='utf8';
            $table->engine='InnoDB';
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
}
