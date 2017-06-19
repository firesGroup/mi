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
        Schema::create('productSpecPrice', function(Blueprint $table){
            $table->integer('pid')->index()->comment('商品id');
            $table->string('key')->index()->comment('商品规格键名');
            $table->string('key_name')->comment('规格键名中文');
            $table->decimal('price',12,2)->default(0.00)->comment('价格');
            $table->integer('store')->default(0)->comment('库存量');
            $table->string('sku')->comment('SKU');
            $table->timestamps();
            $table->primary('pid');
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
        Schema::drop('productSpecPrice');
    }
}
