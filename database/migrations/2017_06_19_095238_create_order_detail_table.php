<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function(Blueprint $table){
            $table->integer('order_id')->unsigned()->comment('订单id');
            $table->integer('p_id')->index()->comment('商品id');
            $table->string('p_name')->comment('商品名称');
            $table->decimal('p_price', 12, 2)->comment('商品单价');
            $table->integer('buy_num')->comment('商品数量');
            $table->timestamps();
            $table->primary('order_id');
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
        Schema::drop('order_detail');
    }
}
