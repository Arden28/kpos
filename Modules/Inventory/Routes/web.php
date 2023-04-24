<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::middleware(['module:inventory', 'auth'])->group(function () {

    Route::get('dashboard', 'InventoryController@index')->name('inventory.index');

});

