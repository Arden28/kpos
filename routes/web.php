<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'auth', 'connected', 'verified'], function () {

    Route::get('/dashboard', 'HomeController@index')
        ->name('dashboard');

    Route::get('/', 'HomeController@index');

        Route::get('/analytics', 'HomeController@indexAnalytics')
        ->name('analytics');

    Route::get('/sales-purchases/chart-data', 'HomeController@salesPurchasesChart')
        ->name('sales-purchases.chart');

    Route::get('/current-month/chart-data', 'HomeController@currentMonthChart')
        ->name('current-month.chart');

    Route::get('/payment-flow/chart-data', 'HomeController@paymentChart')
        ->name('payment-flow.chart');

    // Lang Switcher

    // Companies


    // Route::get('/pay', 'HomeController@pay');
});


// require __DIR__.'/auth.php';
