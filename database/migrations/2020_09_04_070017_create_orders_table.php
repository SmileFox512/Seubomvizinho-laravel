<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->integer('user');
            $table->integer('driver');
            $table->integer('status');
            $table->string('pstatus');
            $table->integer('tax');
            $table->longText('hint');
            $table->boolean('active');
            $table->integer('restaurant');
            $table->string('method');
            $table->decimal('total', 15, 2);
            $table->decimal('fee', 15, 2);
            $table->boolean('send');
            $table->string('address');
            $table->string('phone');
            $table->string('lat');
            $table->string('lng');
            $table->boolean('percent');
            $table->string('curbsidePickup')->nullable();
            $table->string('arrived')->nullable();
            $table->string('couponName')->nullable();
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
