<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_color', function(Blueprint $table) {
            $table->increments('id')->comment('颜色id');
            $table->string('color_name')->index()->comment('颜色名称');
            $table->string('color_img')->index()->comment('颜色图片路径');
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
        Schema::drop('product_color');
    }
}
