<?php

use App\Http\Controllers\Common\CompanyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('auth.login');
// })->middleware('guest');

// Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth', 'connected'], function () {

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
    Route::patch('/companies/connect', [CompanyController::class, 'connectPost'])->name('companies.connect.update');
    Route::resource('companies', CompanyController::class)->except('show', 'edit');
    Route::get('/companies/{api_key}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{api_key}/edit', [CompanyController::class, 'edit'])->name('companies.edit');


    Route::get('/pay', 'HomeController@pay');
});

Route::group(['middleware' => 'auth'], function () {
    Route::patch('/companies/connect/{id}', [CompanyController::class, 'connectPost'])->name('companies.connect');
});

// require __DIR__.'/auth.php';
