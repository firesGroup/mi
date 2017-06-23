<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function(Blueprint $table){
            $table->increments('id')->comment('属性id');
            $table->integer('model_id')->index()->comment('所属模型id');
            $table->string('attr_name',50)->unique()->comment('属性名称');
            $table->tinyInteger('attr_input_type')->default(0)->comment('属性录入方式,默认0为手工录入,1为列表中选择');
            $table->text('attr_values')->comment('属性可选值列表');
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
        Schema:drop('product_attribute');
    }
}
