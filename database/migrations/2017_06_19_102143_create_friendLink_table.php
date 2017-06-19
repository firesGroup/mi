<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendLink', function(Blueprint $table){
            $table->increments('id')->comment('链接id');
            $table->string('link_name')->comment('友情链接名称');
            $table->string('link_url')->comment('友情链接网址');
            $table->string('link_logo')->comment('友情链接logo');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friendLink');
    }
}
