<?php

// use App\Http\Livewire\CreateCustomer;

use App\Http\Livewire\Customer\CreateCustomer;
use Illuminate\Support\Facades\Route;
use Modules\Pos\Http\Controllers\DocPosController;
use Modules\Pos\Http\Controllers\PosController;
use Modules\Pos\Http\Controllers\PosOrderController;

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

Route::middleware(['auth', 'opened'])->group( function() {

    Route::post('/app/pos', [PosController::class, 'store'])->name('app.pos.store');

    //POS

    // Pos Interface
    Route::get('/app/pos/action', [PosController::class, 'index'])->name('app.pos.index');

    // Pos Interface
    Route::get('/app/pos/orders', [PosOrderController::class, 'index'])->name('app.pos.order');


    // Create a new customer
    // Route::post('/create-customer', CreateCustomer::class)->name('create-customer');
});


Route::group(['middleware' => 'auth'], function() {

    Route::get('/app/pos/dashboard', [PosController::class, 'dashboard'])->name('app.pos.dashboard');

    // Pos List
    Route::get('/app/pos/list', [PosController::class, 'listPos'])->name('app.pos.list');

    // settings
    Route::get('/app/pos/settings', [PosController::class, 'settings'])->name('app.pos.settings');

    // Create Physical Pos
    Route::get('/app/pos/add', [PosController::class, 'createPhysical'])->name('app.pos.create');

    Route::post('/app/pos/physical', [PosController::class, 'storePhysical'])->name('app.pos.store.physical');

    // Edit Physical
    Route::get('/app/pos/{id}/edit', [PosController::class, 'editPhysical'])->name('app.pos.edit');

    Route::patch('/app/pos/physical/{id}/edit', [PosController::class, 'updatePhysical'])->name('app.pos.update');

    Route::delete('/app/pos/physical/delete/{id}', [PosController::class, 'destroyPhysical'])->name('app.pos.delete-physical');

    // Physical Pos Session
    Route::post('/app/pos/session', [PosController::class, 'startSession'])->name('app.pos.session.store');

    // Docs
    Route::get('/app/pos/docs/getStarted', [DocPosController::class, 'getStarted'])->name('app.pos.docs.index');
    // Version
    Route::get('/app/pos/docs/version', [DocPosController::class, 'version'])->name('app.pos.docs.version');


});
