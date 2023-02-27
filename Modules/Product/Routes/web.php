<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\BarcodeController;
use Modules\Product\Http\Controllers\CategoriesController;
use Modules\Product\Http\Controllers\InventoryController;
use Modules\Product\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'auth'], function () {
    // Inventory
    Route::get('/dashboard', [InventoryController::class,'index'])->name('inventory.index');

    //Print Barcode
    Route::get('/products/print-barcode', [BarcodeController::class,'printBarcode'])->name('barcode.print');
    //Product
    Route::resource('products', ProductController::class);
    //Product Category
    Route::resource('product-categories', CategoriesController::class)->except('create', 'show');
});
