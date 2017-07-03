<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menu', function(Blueprint $table){
            $table->increments('id')->comment('菜单id');
            $table->string('menu_title')->index()->comment('菜单名称');
            $table->tinyInteger('parent_id')->default(0)->comment('父级id');
            $table->string('menu_href')->index()->default('')->comment('菜单链接');
            $table->string('menu_icon')->index()->default('')->comment('菜单图标');
            $table->tinyInteger('order')->default(0)->comment('排序');
            $table->tinyInteger('status')->default(0)->comment('是否启用菜单,默认0为显示,1为不显示');
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
        Schema::drop('admin_menu');
    }
}
