<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_spec', function(Blueprint $table){
            $table->increments('id')->comment('规格id');
            $table->integer('model_id')->index()->comment('模型id');
            $table->string('spec_name')->unique()->comment('规格名称');
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
        Schema::drop('product_spec');
    }
}
