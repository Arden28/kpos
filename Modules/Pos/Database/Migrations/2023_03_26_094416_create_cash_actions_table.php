<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cash_id');
            $table->unsignedBigInteger('pos_session_id');
            $table->string('action')->nullable();
            $table->string('amount')->nullable();
            $table->string('note')->nullable();

            $table->foreign('cash_id')->references('id')->on('cash_pos')->onDelete('cascade');
            $table->foreign('pos_session_id')->references('id')->on('physical_pos_sessions')->onDelete('cascade');
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
        Schema::dropIfExists('cash_actions');
    }
}
