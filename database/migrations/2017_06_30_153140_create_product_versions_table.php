<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_versions', function(Blueprint $table){
            $table->increments('id')->comment('商品版本id');
            $table->integer('p_id')->index()->comment('商品id');
            $table->string('ver_name')->index()->comment('版本名称');
            $table->string('ver_spec')->nullable()->index()->comment('版本规格');
            $table->string('ver_desc')->default('')->comment('版本简介');
            $table->float('price',12,2)->default(0.00)->comment('版本价格');
            $table->string('contact_p_num',15)->nullable()->comment('搭配商品货号');
            $table->integer('store')->index()->default(0)->comment('版本库存');
            $table->string('ver_img',1500)->nullable()->comment('商品版本图片地址');
            $table->tinyInteger('status')->default(0)->comment('版本状态,0为在售,1为下架,2为预购,3为缺货,4为新品上市');
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
        Schema::drop('product_versions');
    }
}
