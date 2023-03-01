<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\HumanResourceController;
use Modules\User\Http\Controllers\ProfileController;
use Modules\User\Http\Controllers\RolesController;
use Modules\User\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'auth'], function () {

    Route::prefix('/hr')->group(function () {
        Route::get('/dashboard', [HumanResourceController::class, 'index'])->name('hr.index');

        //Users
        Route::resource('users', UsersController::class)->except('show');
        // Route::get('users', [UsersController::class, 'dashboard'])->name('users.dashboard');

        //Roles
        Route::resource('roles', RolesController::class)->except('show');
    });

    //User Profile
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/user/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

});
