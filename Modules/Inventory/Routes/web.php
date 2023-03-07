<?php

use Illuminate\Support\Facades\Route;
use Modules\Inventory\Http\Controllers\AdjustmentController;
use Modules\Inventory\Http\Controllers\BarcodeController;
use Modules\Inventory\Http\Controllers\CategoriesController;
use Modules\Inventory\Http\Controllers\InventoryController;
use Modules\Inventory\Http\Controllers\ProductController;

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

    //Product Category
    Route::resource('product-categories', CategoriesController::class)->except('create', 'show');

    //Product
    Route::resource('products', ProductController::class);

    //Product Adjustment
    Route::resource('adjustments', AdjustmentController::class);
});

