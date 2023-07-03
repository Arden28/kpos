<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('unit_name');
            $table->string('unit_short_name');
            $table->boolean('is_decimal')->default(0); //Allow the product been store and sale by decimal
            $table->boolean('is_multiple')->default(0); //Define this as the multiple of other units. Ex: 1 dozen = 12 units
            $table->unsignedBigInteger('parent_unit_id')->nullable();
            $table->string('value')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('parent_unit_id')->references('id')->on('units')->nullOnDelete();
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
        Schema::dropIfExists('units');
    }
}
