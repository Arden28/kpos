<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\ModuleController;
use Modules\User\DataTables\UsersDataTable;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Route::group(['middleware' => 'auth', 'connected', 'verified'], function () {
    // Route::middleware(['auth', 'verified', 'subscribed'])->group(function () {
    Route::middleware(['auth', 'subscribed'])->group(function () {


    // Install Module
    Route::get('/started', [ModuleController::class, 'start'])
    ->name('start.app');

        // Route::get('/home', 'HomeController@index')
        //     ->name('dashboard');

    // Route::get('/', 'HomeController@index');

        Route::get('/analytics', 'HomeController@indexAnalytics')
        ->name('analytics');

    Route::get('/sales-purchases/chart-data', 'HomeController@salesPurchasesChart')
        ->name('sales-purchases.chart');

    Route::get('/current-month/chart-data', 'HomeController@currentMonthChart')
        ->name('current-month.chart');

    Route::get('/payment-flow/chart-data', 'HomeController@paymentChart')
        ->name('payment-flow.chart');

    // Lang Switcher

    Route::get('tests', function(UsersDataTable $dataTable) {
        return $dataTable->render('test');
    });
    // Companies


    // Route::get('/sms', 'HomeController@sendSms')
    // ->name('sms');

    Route::get('main', 'HomeController@mainPage')->name('main');

    Route::get('/home', 'HomeController@mainPage')
        ->name('dashboard');

    Route::get('/', 'HomeController@mainPage');

    // Route::get('/pay', 'HomeController@pay');
});


// require __DIR__.'/auth.php';
