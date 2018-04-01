<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('goods_id');
            $table->string('goods_name',125);
            $table->integer('goods_num');
            $table->decimal('goods_price', 5, 2);
            $table->decimal('market_price', 5, 2);
            $table->string('spec_key',128);
            $table->string('spec_key_name',128);
            $table->tinyInteger('is_comment');
            $table->tinyInteger('is_send');
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
        Schema::dropIfExists('order_goods');
    }
}
