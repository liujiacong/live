<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id');
            $table->integer('extend_cate');
            $table->string('goods_sn',20);
            $table->string('goods_title',120);
            $table->string('goods_title2',120);
            $table->integer('store_count');
            $table->integer('comment_count');
            $table->decimal('market_Price', 5, 2);
            $table->decimal('shop_price', 5, 2);
            $table->tinyInteger('is_real');
            $table->tinyInteger('is_sale');
            $table->tinyInteger('is_hot');
            $table->integer('goods_type');
            $table->tinyInteger('is_recommend');
            $table->integer('store_id');
            $table->tinyInteger('is_delect');
            $table->string('photo',120);
            $table->string('picture',500);
            $table->longText('goods_content');
            $table->integer('shop_order');
            $table->integer('order');

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
        Schema::dropIfExists('goods');
    }
}
