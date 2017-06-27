<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_spec_price', function(Blueprint $table){
            $table->increments('id')->comment('主键id');
            $table->integer('p_id')->index()->comment('商品id');
            $table->string('spec_key')->index()->comment('商品规格键名');
            $table->string('spec_key_name')->index()->comment('规格键名中文');
            $table->decimal('price',12,2)->default(0.00)->comment('价格');
            $table->integer('store')->default(0)->comment('库存量');
            $table->string('sku')->comment('SKU');
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
        Schema::drop('product_spec_price');
    }
}
