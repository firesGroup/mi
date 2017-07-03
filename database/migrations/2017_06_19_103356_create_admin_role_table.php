<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_role', function(Blueprint $table){
            $table->increments('id')->comment('权限id');
            $table->tinyInteger('group_id')->index()->comment('所属用户组');
            $table->string('role_name')->index()->comment('权限名称');
            $table->string('role_desc')->comment('权限描述');
            $table->string('role')->comment('操作码,格式:操作控制器+方法名');
            $table->tinyInteger('status')->default(0)->comment('权限状态;默认为0正常,1为禁止');
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
        Schema::drop('admin_role');
    }
}
