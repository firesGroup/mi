<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitToProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productDetail', function (Blueprint $table) {
            $table->string('unit',10)->default('件')->comment('商品单位');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productDetail', function (Blueprint $table) {
            $table->dropColumn('unit');
        });
    }
}
