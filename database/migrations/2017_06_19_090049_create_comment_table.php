<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function(Blueprint $table){
            $table->increments('id')->comment('评论id');
            $table->integer('member_id')->index()->comment('用户id');
            $table->integer('p_id')->index()->comment('商品id');
            $table->string('content')->comment('评论内容');
            $table->string('images')->comment('评论图片路径');
            $table->tinyInteger('star')->default(0)->comment(',默认0代表好评,1为中评,2为差评');
            $table->tinyInteger('is_hide')->default(0)->comment('是否匿名,默认0为匿名,1为显示用户名');
            $table->tinyInteger('type')->comment('评论类型,0为首次评价,1为追加,2为回复');
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
        Schema::drop('comment');
    }
}
