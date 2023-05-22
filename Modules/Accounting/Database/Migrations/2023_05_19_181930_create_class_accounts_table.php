<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chart_of_account_id')->onDelete('cascade');
            $table->foreignId('account_class_id')->onDelete('cascade');
            $table->string('code');
            $table->string('entitled');
            $table->integer('initial_balance')->default(0);
            $table->string('parent_account_code')->nullable();
            $table->foreignId('parent_account_id')->nullable()->onDelete('cascade');
            $table->string('short_name')->nullable();
            $table->decimal('vta_rate', 5, 2)->nullable();
            $table->string('counterparty_account')->nullable();
            $table->decimal('planned_budget', 10, 2)->nullable();
            $table->decimal('budget_real', 10, 2)->nullable();
            $table->decimal('remaining_budget', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->text('notes')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
