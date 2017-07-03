<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_value', function(Blueprint $table){
            $table->increments('id')->comment('属性值id');
            $table->integer('p_id')->index()->comment('商品id');
            $table->integer('attr_id')->index()->comment('属性id');
            $table->text('attr_value')->comment('属性值名称');
            $table->decimal('attr_price')->default(0.00)->comment('属性价格');
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
        Schema::drop('product_attribute_value');
    }
}
