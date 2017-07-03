<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function(Blueprint $table){
            $table->increments('id')->comment('管理员id');
            $table->integer('group_id')->comment('管理员用户组id');
            $table->string('username')->comment('管理员用户名');
            $table->string('password')->comment('登陆密码');
            $table->tinyInteger('status')->comment('管理员状态,0为启用,1为锁定');
            $table->timestamp('add_time')->comment('添加时间');
            $table->timestamp('last_time')->comment('最后登陆时间');
            $table->ipAddress('last_ip')->comment('最后登陆ip');
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
        Schema::drop('admin');
    }
}
