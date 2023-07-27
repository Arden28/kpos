<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_type')->default('storable')->after('product_name');
            // $table->foreign('product_type_id')->references('id')->on('product_types')->nullOnDelete();
            $table->boolean('can_be_sold')->default(true)->after('product_note');
            $table->boolean('can_be_purchased')->default(true)->after('can_be_sold');
            $table->boolean('can_be_rented')->default(false)->after('can_be_purchased');
            $table->boolean('product_status')->default(true)->after('can_be_rented');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

        });
    }
}
