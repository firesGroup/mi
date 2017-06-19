<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productSpecItem', function(Blueprint $table){
            $table->increments('id')->comment('规格项id');
            $table->integer('spec_id')->index()->comment('规格id');
            $table->string('spec_item')->index()->comment('规格项名称');
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
        Schema::drop('productSpecItem');
    }
}
