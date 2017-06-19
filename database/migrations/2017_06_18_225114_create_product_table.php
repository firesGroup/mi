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
            $table->integer('cid')->comment('类别id');
            $table->integer('bid')->comment('品牌id');
            $table->decimal('price',12,2)->comment('商品价格');
            $table->decimal('market_price',12,2)->comment('市场价格');
            $table->string('p_name')->comment('商品名称');
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
