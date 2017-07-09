<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function(Blueprint $table){
            $table->increments('id')->comment('分类id');
            $table->string('category_name')->comment('分类名称');
            $table->integer('parent_id')->comment('父类id');
            $table->string('parent_path')->comment('家族图谱');
            $table->tinyInteger('status')->default(1)->comment('是否推荐');
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
        Schema::drop('category');
    }
}
