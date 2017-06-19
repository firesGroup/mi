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
        Schema::create('productAttribute', function(Blueprint $table){
            $table->increments('id')->comment('属性id');
            $table->integer('mid')->index()->comment('所属模型id');
            $table->string('attr_name',50)->index()->comment('属性名称');
            $table->tinyInteger('attr_input_type')->default(0)->comment('属性录入方式,默认0为手工录入,1为列表中选择');
            $table->text('attr_values')->comment('属性可选值列表');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:drop('productAttribute');
    }
}
