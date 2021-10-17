<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
	        $table->string('name');
            $table->integer('imageid');
 	        $table->decimal('price', 15, 2);
            $table->decimal('discountprice', 15, 2);
            $table->longText('desc');
            $table->integer('restaurant');
            $table->integer('category');
            $table->longText('ingredients');
            $table->string('unit');
            $table->integer('packageCount');
            $table->integer('weight');
            $table->boolean('canDelivery');
            $table->integer('stars');
            $table->boolean('published');
            $table->integer('extras');
            $table->integer('nutritions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
