<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'member',function(Blueprint $table){
            $table->increments('id')->comment('用户id');
            $table->string('nick_name',20)->comment('用户昵称');
            $table->string('email')->comment('电子邮箱');
            $table->unsignedInteger('phone')->comment('手机号码');
            $table->tinyInteger('status')->default('0')->comment('用户状态,0为正常,1为锁定');
            $table->ipAddress('last_ip')->comment('最后登陆ip');
            $table->rememberToken();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member');
    }
}
