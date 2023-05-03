<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::middleware(['module:inventory', 'auth'])->group(function () {

    Route::get('dashboard', 'InventoryController@index')->name('inventory.index');

    Route::get('suppliers', 'InventoryController@supplier')->name('inventory.suppliers');

});

