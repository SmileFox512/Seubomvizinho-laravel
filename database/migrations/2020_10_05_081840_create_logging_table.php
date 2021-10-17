<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoggingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logging', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user');
            $table->string('param1');
            $table->string('param2');
            $table->string('param3');
            $table->string('param4');
            $table->string('param5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logging');
    }
}
