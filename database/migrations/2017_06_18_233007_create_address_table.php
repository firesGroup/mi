<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function(Blueprint $table){
            $table->increments('id')->comment('地址id');
            $table->integer('member_id')->index()->comment('用户id');
            $table->string('buy_user')->comment('收货人');
            $table->integer('buy_phone')->comment('收货人手机号');
            $table->string('address')->comment('收货地址');
            $table->tinyInteger('status')->default(0)->comment('地址状态,默认为0,1为普通');
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
        Schema::drop('address');
    }
}
