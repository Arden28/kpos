<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::middleware(['module:inventory', 'auth', 'subscribed'])->group(function () {
    //Print Barcode
    Route::get('/products/print-barcode', 'BarcodeController@printBarcode')->name('barcode.print');

    // Route::get('dashboard', 'InventoryController@index')->name('inventory.index');

    //Product
    Route::resource('products', 'ProductController');
    //Product Category
    Route::resource('product-categories', 'CategoriesController')->except('create', 'show');

    //Product Unit
    Route::resource('product-units', 'UnitController')->except('create', 'show');
});

