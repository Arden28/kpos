<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth', 'subscribed'], function () {

    //Mail Settings
    Route::patch('/settings/smtp', 'SettingController@updateSmtp')->name('settings.smtp.update');
    //General Settings
    // Route::get('/settings/{company_id}', 'SettingController@index')->name('settings.index');
    // Route::patch('/settings/{id}', 'SettingController@update')->name('settings.update');

    // Route::patch('/settings/{id}', 'SettingController@update')->name('settings.update');
    //Settings
    Route::resource('settings', 'SettingController')->except('create', 'show');

    // Users
    Route::get('/settings/users', 'SettingController@users')->name('settings.users');

    // Application
    // Install
    Route::post('/module/{module}/install', 'ModuleController@install')->name('module.install');
    // Uninstall
    Route::post('/module/{module}/uninstall', 'ModuleController@uninstall')->name('module.uninstall');

});
