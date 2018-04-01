<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('sex');
            $table->decimal('money', 5, 2);
            $table->string('qq',20);
            $table->string('mobile',20)->unique();
            $table->string('head_pic',50);
            $table->tinyInteger('is_lock');
            $table->tinyInteger('has_store');
            $table->integer('school_id');
            $table->string('cart');
            $table->string('collection_shop');
            $table->string('collection_store');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
