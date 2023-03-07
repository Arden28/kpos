<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('reference')->nullable();
            $table->string('type')->nullable();
            $table->integer('default_currency_id')->nullable();
            $table->string('default_currency_position')->nullable();
            $table->string('notification_email')->nullable();
            $table->text('company_address')->nullable();
            $table->string('created_from', 100)->nullable();

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
        Schema::dropIfExists('settings');
    }
}
