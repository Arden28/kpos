<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('company_id');
            $table->foreignId('account_id')->nullable();
            $table->foreignId('current_pos_session_id')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('enable')->default(true);

            // $table->foreign('current_pos_id')->references('id')->on('physical_pos_sessions')->nullOnDelete();

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
        Schema::dropIfExists('pos');
    }
}
