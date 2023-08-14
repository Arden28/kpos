<?php

use App\Http\Livewire\Customer\CreateCustomer;
use Illuminate\Support\Facades\Route;
use Modules\People\Http\Controllers\CrmController;
use Modules\People\Http\Controllers\CustomersController;
use Modules\People\Http\Controllers\SuppliersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['module:crm', 'auth', 'subscribed'])->group(function () {
    // CRM
    Route::get('/dashboard', [CrmController::class, 'index'])->name('crm.index');
    //Customers
    Route::resource('customers', CustomersController::class);
    // Route::post('/create-customer', CreateCustomer::class)->name('create-customer');
    Route::post('/create-customer', [CustomersController::class, 'modalStore'])->name('create-customer');
    //Suppliers
    Route::resource('suppliers', SuppliersController::class);

});
