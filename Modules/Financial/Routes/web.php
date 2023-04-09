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


Route::group(['middleware' => 'auth'], function () {
    // Overview
    Route::get('/dashboard', [FinancialController::class, 'index'])->name('finance.index');
    Route::resource('account', AccountController::class);


    Route::resource('book', AccountBookController::class)->except('show', 'edit', 'update');
    // Account Books

});
