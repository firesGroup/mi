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
            $table->string('nick_name',20)->unique()->comment('用户昵称');
            $table->string('email')->nullable()->unique()->comment('电子邮箱');
            $table->string('password')->comment('用户密码');
            $table->string('phone', 16)->nullable()->unique()->comment('手机号码');
            $table->tinyInteger('status')->default('0')->comment('用户状态,0为正常,1为锁定');
            $table->ipAddress('last_ip')->comment('最后登陆ip');
            $table->rememberToken();
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
        Schema::drop('member');
    }
}
