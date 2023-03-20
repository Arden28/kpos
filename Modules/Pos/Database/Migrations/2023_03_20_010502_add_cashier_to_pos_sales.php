<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCashierToPosSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pos_sales', function (Blueprint $table) {
            $table->unsignedBigInteger('cashier_id')->nullable();

            $table->foreign('cashier_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pos_sales', function (Blueprint $table) {
            Schema::dropIfExists('add_cashier_to_pos_sales');
        });
    }
}
