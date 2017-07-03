<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert', function (Blueprint $table) {
            $table->increments('id')->comment('广告id');
            $table->string('advert_image')->comment('广告图片路径');
            $table->string('advert_url')->comment('广告链接');
            $table->string('ad_location')->comment('广告位置');
            $table->tinyInteger('status')->default('0')->comment('广告状态;0:开启,1禁用');
            $table->text('ad_desc')->comment('广告描述');
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
        Schema::drop('advert');
    }
}
