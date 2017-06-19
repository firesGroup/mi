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
        Schema::create('productSpec', function(Blueprint $table){
            $table->increments('id')->comment('规格id');
            $table->integer('mid')->comment('模型id');
            $table->string('spec_name')->comment('规格名称');
            $table->index('mid');
            $table->index('spec_name');
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
        Schema::drop('productSpec');
    }
}
