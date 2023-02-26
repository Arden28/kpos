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
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->string('company_name');
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('reference')->nullable();
            $table->string('type')->nullable();
            $table->integer('default_currency_id')->nullable();
            $table->string('default_currency_position')->nullable();
            $table->string('notification_email')->nullable();
            $table->text('footer_text')->nullable();
            $table->text('company_address')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_zip_code')->nullable();
            $table->string('company_state')->nullable();
            $table->string('company_country')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_size')->nullable();
            $table->string('primary_interest')->nullable();
            // $table->boolean('enabled')->default(1);
            $table->string('created_from', 100)->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
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
