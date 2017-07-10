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
        Schema::create( 'member_detail', function(Blueprint $table){
            $table->integer('member_id')->comment('用户id');
            $table->tinyInteger('sex')->default('0')->comment('用户性别,0为保密,1为男,2为女');
            $table->date('birthday')->nullable()->comment('生日');
            $table->string('avator')->default('/uploads/avator/default.jpg')->comment('头像路径');
            $table->timestamps();
            $table->primary('member_id');
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
        Schema::drop('member_detail');
    }
}
