<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::middleware(['module:inventory', 'auth', 'subscribed'])->group(function () {

    Route::get('dashboard', 'InventoryController@index')->name('inventory.index');

    Route::get('suppliers', 'InventoryController@supplier')->name('inventory.suppliers');

    // Statistics Inventory

    Route::get('/order-tracking/chart-data', 'InventoryController@orderTrackingChartData')
        ->name('order-tracking.chart');

});

