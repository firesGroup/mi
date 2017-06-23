<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'collect', function(Blueprint $table){
            $table->increments('id')->comment('收藏id');
            $table->integer('member_id')->comment('用户id');
            $table->integer('p_id')->comment('商品id');
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
        Schema::drop('collect');
    }
}
