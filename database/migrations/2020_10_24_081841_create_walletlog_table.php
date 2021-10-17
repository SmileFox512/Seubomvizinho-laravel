<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walletlog', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user');
            $table->decimal('amount', 15, 2);
            $table->decimal('total', 15, 2);
            $table->boolean('arrival');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walletlog');
    }
}
