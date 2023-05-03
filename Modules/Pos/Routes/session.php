<?php

use Illuminate\Support\Facades\Route;
use Modules\Pos\Http\Controllers\PosController;
use Modules\Pos\Http\Controllers\PosSessionController;

/*
|--------------------------------------------------------------------------
| Session Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::middleware(['module:pos', 'auth'])->group(function() {

        // Start a session
        Route::post('/app/pos/session', [PosController::class, 'startSession'])->name('app.pos.session.store');

        //  Get a specific pos's sessions
        Route::get('/app/pos/{id}/session', [PosSessionController::class, 'show'])->name('app.pos.session.single');

        //  Get all pos' sessions
        Route::get('/app/pos/sessions', [PosSessionController::class, 'index'])->name('app.pos.session.index');

        // Delete Session
        Route::delete('/app/pos/{id}/session', [PosSessionController::class, 'destroy'])->name('app.pos.session.delete');

    });
