<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVersionsColorsTable extends Migration
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
            $table->integer('p_id')->index()->comment('商品id');
            $table->integer('ver_id')->index()->comment('版本id');
            $table->integer('color_id')->index()->comment('颜色id');
            $table->string('color_name')->index()->comment('颜色名称');
            $table->string('color_img')->index()->comment('颜色图片');
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
        Schema::drop('product_versions_colors');
    }
}
