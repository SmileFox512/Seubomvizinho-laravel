<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->boolean('published');
            $table->boolean('delivered');
            $table->string('phone');
            $table->string('mobilephone');
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->integer('imageid');
            $table->longText('desc');
            $table->decimal('fee', 15, 2);
            $table->boolean('percent');

            $table->string('openTimeMonday')->nullable();
            $table->string('closeTimeMonday')->nullable();
            $table->string('openTimeTuesday')->nullable();
            $table->string('closeTimeTuesday')->nullable();
            $table->string('openTimeWednesday')->nullable();
            $table->string('closeTimeWednesday')->nullable();
            $table->string('openTimeThursday')->nullable();
            $table->string('closeTimeThursday')->nullable();
            $table->string('openTimeFriday')->nullable();
            $table->string('closeTimeFriday')->nullable();
            $table->string('openTimeSaturday')->nullable();
            $table->string('closeTimeSaturday')->nullable();
            $table->string('openTimeSunday')->nullable();
            $table->string('closeTimeSunday')->nullable();

            $table->integer('area')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
