<?php

use Illuminate\Support\Facades\Route;
use Modules\Financial\Http\Controllers\Accounting\AccountBookController;
use Modules\Financial\Http\Controllers\FinancialController;
use Modules\Financial\Http\Controllers\Accounting\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['module:finance', 'auth', 'subscribed'])->group(function () {
    // Overview
    Route::get('/dashboard', [FinancialController::class, 'index'])->name('finance.index');

    // Accounting Balance
    Route::get('/account/balance', [FinancialController::class, 'accountingBalance'])->name('finance.balance');

    Route::resource('account', AccountController::class);


    Route::resource('book', AccountBookController::class)->except('show', 'edit', 'update');

    // Account Books
    Route::post('book/deposit/{id}', [AccountBookController::class, 'deposit'])->name('book.deposit');
    Route::post('book/withdrawal/{id}', [AccountBookController::class, 'withdrawal'])->name('book.withdrawal');
});
