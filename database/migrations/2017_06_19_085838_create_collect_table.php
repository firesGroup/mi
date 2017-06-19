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
            $table->integer('mid')->comment('用户id');
            $table->integer('pid')->comment('商品id');
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
        Schema::drop('collect');
    }
}
