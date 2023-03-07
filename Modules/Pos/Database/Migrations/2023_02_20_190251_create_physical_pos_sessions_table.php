<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalPosSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_pos_sessions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pos_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->string('start_date');
            $table->string('start_amount');
            $table->string('note')->nullable();
            $table->string('end_amount')->nullable();
            $table->string('end_date')->nullable();
            $table->string('end_note')->nullable();
            $table->boolean('is_active')->default(true);

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('physical_pos_sessions');
    }
}
