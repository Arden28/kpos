<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', 'InventoryController@index')->name('inventory.index');

});

