<?php

use Illuminate\Support\Facades\Route;
use Modules\Subby\Http\Controllers\StripeController;
use Modules\Subby\Http\Controllers\SubbyController;

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


Route::prefix('subscribe')->middleware(['auth'])->group(function() {
    Route::get('/plans', [SubbyController::class, 'index'])->name('subby.index');
});

// Stripe
Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
