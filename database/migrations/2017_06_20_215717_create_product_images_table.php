<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'product_images', function(Blueprint $table){
            $table->increments('id')->comment('图片id');
            $table->integer('p_id')->comment('商品id');
            $table->string('path')->index()->comment('商品图片地址');
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'product_images' );
    }
}
