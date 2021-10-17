<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->dateTime('dateStart');
            $table->dateTime('dateEnd');
            $table->decimal('discount', 15, 2);
            $table->boolean('published');
            $table->boolean('inpercents');
            $table->decimal('amount', 15, 2);
            $table->string('desc');
            $table->boolean('allRestaurants');
            $table->boolean('allCategory');
            $table->boolean('allFoods');
            $table->longText('restaurantsList');
            $table->longText('categoryList');
            $table->longText('foodsList');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
