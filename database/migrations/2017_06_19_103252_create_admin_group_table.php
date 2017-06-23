<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_group', function(Blueprint $table){
            $table->increments('id')->comment('用户组id');
            $table->string('group_name')->index()->comment('用户组名称');
            $table->string('group_desc')->comment('用户组简介');
            $table->string('role_list')->comment('分配权限id列表');
            $table->tinyInteger('status')->default(0)->comment('用户组状态,默认为0 代表启用,1为锁定');
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
        Schema::drop('admin_group');
    }
}
