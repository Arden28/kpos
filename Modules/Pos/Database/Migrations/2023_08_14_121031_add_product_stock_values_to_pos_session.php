<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductStockValuesToPosSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('physical_pos_sessions', function (Blueprint $table) {
            $table->integer('start_stock_price_value')->default(0)->after('end_date');
            $table->integer('start_stock_cost_value')->default(0)->after('start_stock_price_value');
            $table->integer('end_stock_price_value')->default(0)->after('start_stock_cost_value');
            $table->integer('end_stock_cost_value')->default(0)->after('end_stock_price_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('', function (Blueprint $table) {

        });
    }
}
