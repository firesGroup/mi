<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function(Blueprint $table){
            $table->increments('id')->comment('购物车id');
            $table->integer('member_id')->index()->default(0)->comment('用户id');
            $table->string('session_id')->index()->comment('session');
            $table->integer('p_id')->comment('商品id');
            $table->string('p_name')->comment('商品名称');
            $table->decimal('price',12,2)->comment('商品价格');
            $table->decimal('market_price', 12, 2)->comment('市场价');
            $table->integer('buy_num')->comment('商品购买数量');
            $table->string('spec_key')->comment('规格键名Key');
            $table->string('spec_key_name')->comment('商品规格键名中文名称');
            $table->tinyInteger('select_status')->default(0)->comment('选中状态,默认0为选中,1为未选中');
            $table->timestamp('add_time')->comment('添加时间');
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
        Schema::drop('cart');
    }
}
