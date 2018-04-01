<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_cates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id');
            $table->string('path');
            $table->integer('level');
            $table->integer('order');
            $table->string('img');
            $table->tinyInteger('is_show');
            $table->tinyInteger('is_hot');
            $table->integer('store_id');
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
        Schema::dropIfExists('goods_cates');
    }
}
