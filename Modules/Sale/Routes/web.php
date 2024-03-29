<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\DomPDF\Facade\Pdf;
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


Route::middleware(['module:sales', 'auth', 'subscribed'])->group(function () {

    //POS
    // Route::get('/app/pos', 'PosController@index')->name('app.pos.index');
    // Route::post('/app/pos', 'PosController@store')->name('app.pos.store');

    // Sales Module
    // Route::get('/sales/dashbo', 'SalePaymentsController@index')->name('sale-payments.index');


    //Generate PDF
    Route::get('/sales/pdf/{id}', function ($id) {
        $sale = \Modules\Sale\Entities\Sale::findOrFail($id);
        $customer = \Modules\People\Entities\Customer::findOrFail($sale->customer_id);
        $seller = \App\Models\User::findOrFail($sale->seller_id);
        $company = \App\Models\Company::findOrFail($sale->company_id);

        $pdf = Pdf::loadView('sale::print', [
            'sale' => $sale,
            'customer' => $customer,
            'seller' => $seller,
            'company' => $company
        ])->setPaper('a4');

        return $pdf->stream('sale-'. $sale->reference .'.pdf');
    })->name('sales.pdf');

    // POS BILL
    Route::get('/sales/pos/pdf/{id}', function ($id) {
        $sale = \Modules\Sale\Entities\Sale::findOrFail($id);
        $seller = \App\Models\User::findOrFail($sale->seller_id);


        $pdf = PDF::loadView('sale::print-pos', [
            'sale' => $sale,
            'seller' => $seller,
        ])->setPaper('a7')
            ->setOption('margin-top', 8)
            ->setOption('margin-bottom', 8)
            ->setOption('margin-left', 5)
            ->setOption('margin-right', 5);

        return $pdf->stream('sale-'. $sale->reference .'.pdf');
    })->name('sales.pos.pdf');

    //Sales
    Route::resource('sales', 'SaleController');

    //Payments
    Route::get('/sale-payments/{sale_id}', 'SalePaymentsController@index')->name('sale-payments.index');
    Route::get('/sale-payments/{sale_id}/create', 'SalePaymentsController@create')->name('sale-payments.create');
    Route::post('/sale-payments/store', 'SalePaymentsController@store')->name('sale-payments.store');
    Route::get('/sale-payments/{sale_id}/edit/{salePayment}', 'SalePaymentsController@edit')->name('sale-payments.edit');
    Route::patch('/sale-payments/update/{salePayment}', 'SalePaymentsController@update')->name('sale-payments.update');
    Route::delete('/sale-payments/destroy/{salePayment}', 'SalePaymentsController@destroy')->name('sale-payments.destroy');

    // Customers
    Route::get('/customers', 'SaleController@customer')->name('sales.customers');

    // Products
    Route::get('/products', 'SaleController@product')->name('sales.products');

    // Services
    Route::get('/services', 'SaleController@service')->name('sales.services');
});
