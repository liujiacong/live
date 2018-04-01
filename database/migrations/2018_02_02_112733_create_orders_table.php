<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_sn',25);
            $table->integer('user_id');
            $table->tinyInteger('order_status');
            $table->tinyInteger('shipping_status');
            $table->tinyInteger('pay_status');
            $table->string('consignee',60);
            $table->string('province',25);
            $table->string('city',25);
            $table->string('district',25);
            $table->string('address',125);
            $table->string('zipcode',25);
            $table->string('mobile',25);
            $table->string('pay_code',25)->nullable($value = true);
            $table->string('pay_name',25)->nullable($value = true);
            $table->decimal('goods_price', 5, 2);
            $table->decimal('order_price', 5, 2);
            $table->decimal('total_price', 5, 2);
            $table->string('user_note',225);
            $table->decimal('shipping_time', 5, 2);
            $table->decimal('confirm_time', 5, 2);
            $table->decimal('pay_time', 5, 2);
            $table->tinyInteger('deleted');
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
        Schema::dropIfExists('orders');
    }
}
