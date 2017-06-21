<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'level', function(Blueprint $table){
            $table->increments('id')->comment('等级id');
            $table->string('level_name')->comment('等级名称');
            $table->decimal('consumption', 12,2)->comment('消费金额');
            $table->string('discount', 10)->comment('折扣率');
            $table->text('level_detail')->comment('等级描述');
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
        Schema::drop('level');
    }
}
