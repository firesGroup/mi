<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function(Blueprint $table){
            $table->increments('id')->comment('订单id');
            $table->string('order_sn')->index()->comment('订单编号');
            $table->integer('member_id')->comment('用户id');
            $table->string('buy_user')->comment('收货人');
            $table->integer('buy_phone')->comment('收货手机');
            $table->string('address')->comment('收货地址');
            $table->decimal('total',15,2)->comment('订单总价');
            $table->timestamp('add_time')->comment('下单时间');
            $table->tinyInteger('order_status')->default(0)->comment('订单状态,默认为0代表未支付,1代表已支付,2代表未发货,3代表已发货,4代表已收货,5代表退款中,6代表交易成功');
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
        Schema::drop('order');
    }
}
