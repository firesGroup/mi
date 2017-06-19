<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'memberDetail', function(Blueprint $table){
            $table->integer('mid')->unique()->comment('用户id');
            $table->tinyInteger('sex')->default('0')->comment('用户性别,0为保密,1为男,2为女');
            $table->date('birthday')->comment('生日');
            $table->string('avator')->default('/uploads/avator/default.jpg')->comment('头像路径');
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
        Schema::drop('memberDefault');
    }
}
