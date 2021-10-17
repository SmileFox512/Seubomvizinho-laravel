<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordersdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('order');
            $table->string('food');
            $table->integer('count');
            $table->decimal('foodprice', 15, 2);
            $table->string('extras');
            $table->integer('extrascount');
            $table->decimal('extrasprice', 15, 2);
            $table->integer('foodid');
            $table->integer('extrasid');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordersdetails');
    }
}
