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
        Schema::create('orderDetail', function(Blueprint $table){
            $table->integer('order_id')->unsigned()->index()->comment('订单id');
            $table->integer('pid')->index()->comment('商品id');
            $table->string('p_name')->comment('商品名称');
            $table->decimal('p_price', 12, 2)->comment('商品单价');
            $table->integer('p_num')->comment('商品数量');
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
        Schema::drop('orderDetail');
    }
}
