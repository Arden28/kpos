<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_pos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pos_id');
            $table->string('amount')->nullable();

            $table->string('last_transaction')->nullable();
            $table->foreign('pos_id')->references('id')->on('pos')->onDelete('cascade');
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
        Schema::dropIfExists('cash_pos');
    }
}
