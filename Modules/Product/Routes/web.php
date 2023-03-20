<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'auth'], function () {
    //Print Barcode
    Route::get('/products/print-barcode', 'BarcodeController@printBarcode')->name('barcode.print');

    Route::get('dashboard', 'InventoryController@index')->name('inventory.index');

    //Product
    Route::resource('products', 'ProductController');
    //Product Category
    Route::resource('product-categories', 'CategoriesController')->except('create', 'show');
});

