<?php

namespace Modules\Sale\Repositories;

use App\Traits\CompanySession;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\People\Entities\Customer;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SaleDetails;
use Modules\Sale\Entities\SalePayment;
use Modules\Sale\Interfaces\SaleInterface;

class SaleRepository implements SaleInterface
{
    use CompanySession;

    /**
     * Store a sale in storage.
     *
     */
    public function addSale($request)
    {
            DB::transaction(function () use ($request) {
                $due_amount = $request['total_amount'] - $request['paid_amount'];

                if (isset($request['payment_method'])) {
                    // Access the payment_method key
                    $paymentMethod = $request['payment_method'];
                } else {
                    // Set a default value for payment_method
                    $paymentMethod = 'Cash';
                }
                if ($due_amount == $request['total_amount']) {
                    $payment_status = 'Unpaid';
                } elseif ($due_amount > 0) {
                    $payment_status = 'Partial';
                } else {
                    $payment_status = 'Paid';
                }

                $sale = Sale::create([

                    'company_id'=> Auth::user()->currentCompany->id,
                    'date' => now()->format('Y-m-d'),
                    'reference' => 'PSL',
                    'customer_id' => $request['customer_id'],
                    'customer_name' => Customer::findOrFail($request['customer_id'])['customer_name'],
                    'tax_percentage' => $request['tax_percentage'],
                    'discount_percentage' => $request['discount_percentage'],
                    'shipping_amount' => $request['shipping_amount'] * 100,
                    'paid_amount' => $request['paid_amount'] * 100,
                    'total_amount' => $request['total_amount'] * 100,
                    'due_amount' => $due_amount * 100,
                    'status' => 'Completed',
                    'payment_status' => $payment_status,
                    'payment_method' => $paymentMethod,
                    'note' => $request['note'],
                    'tax_amount' => Cart::instance('sale')->tax() * 100,
                    'discount_amount' => Cart::instance('sale')->discount() * 100,
                    // 'seller_id' => $request['seller_id'],
                ]);

                foreach (Cart::instance('sale')->content() as $cart_item) {

                    SaleDetails::create([
                        'sale_id' => $sale->id,
                        'product_id' => $cart_item->id,
                        'product_name' => $cart_item->name,
                        'product_code' => $cart_item->options->code,
                        'quantity' => $cart_item->qty,
                        'price' => $cart_item->price * 100,
                        'unit_price' => $cart_item->options->unit_price * 100,
                        'sub_total' => $cart_item->options->sub_total * 100,
                        'product_discount_amount' => $cart_item->options->product_discount * 100,
                        'product_discount_type' => $cart_item->options->product_discount_type,
                        'product_tax_amount' => $cart_item->options->product_tax * 100,
                    ]);

                    $product = Product::findOrFail($cart_item->id);
                    $product->update([
                        'product_quantity' => $product->product_quantity - $cart_item->qty
                    ]);
                }

                Cart::instance('sale')->destroy();

                if ($sale->paid_amount > 0) {
                    SalePayment::create([
                        'company_id'=> Auth::user()->currentCompany->id,
                        'date' => now()->format('Y-m-d'),
                        'reference' => 'INV/'.$sale->reference,
                        'amount' => $sale->paid_amount,
                        'sale_id' => $sale->id,
                        'payment_method' => $paymentMethod
                    ]);
                }
            });

    }

    // Edit Sale
    public function updateSale($request, $sale){

        DB::transaction(function () use ($request, $sale) {

            $due_amount = $request['total_amount'] - $request['paid_amount'];

            if ($due_amount == $request['total_amount']) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            foreach ($sale['saleDetails'] as $sale_detail) {
                if ($sale['status'] == 'Shipped' || $sale['status'] == 'Completed') {
                    $product = Product::findOrFail($sale_detail['product_id']);
                    $product->update([
                        'product_quantity' => $product['product_quantity'] + $sale_detail['quantity']
                    ]);
                }
                $sale_detail->delete();
            }

            $sale->update([
                'date' => $request['date'],
                'reference' => $request['reference'],
                'customer_id' => $request['customer_id'],
                'customer_name' => Customer::findOrFail($request['customer_id'])['customer_name'],
                'tax_percentage' => $request['tax_percentage'],
                'discount_percentage' => $request['discount_percentage'],
                'shipping_amount' => $request['shipping_amount'] * 100,
                'paid_amount' => $request['paid_amount'] * 100,
                'total_amount' => $request['total_amount'] * 100,
                'due_amount' => $due_amount * 100,
                'status' => $request['status'],
                'payment_status' => $payment_status,
                'payment_method' => $request['payment_method'],
                'note' => $request['note'],
                'tax_amount' => Cart::instance('sale')->tax() * 100,
                'discount_amount' => Cart::instance('sale')->discount() * 100,
            ]);

            foreach (Cart::instance('sale')->content() as $cart_item) {
                SaleDetails::create([
                    'sale_id' => $sale['id'],
                    'product_id' => $cart_item['id'],
                    'product_name' => $cart_item['name'],
                    'product_code' => $cart_item['options']['code'],
                    'quantity' => $cart_item['qty'],
                    'price' => $cart_item['price'] * 100,
                    'unit_price' => $cart_item['options']['unit_price'] * 100,
                    'sub_total' => $cart_item['options']['sub_total'] * 100,
                    'product_discount_amount' => $cart_item['options']['product_discount'] * 100,
                    'product_discount_type' => $cart_item['options']['product_discount_type'],
                    'product_tax_amount' => $cart_item['options']['product_tax'] * 100,
                ]);

                if ($request['status'] == 'Shipped' || $request['status'] == 'Completed') {
                    $product = Product::findOrFail($cart_item['id']);
                    $product->update([
                        'product_quantity' => $product->product_quantity - $cart_item->qty
                    ]);
                }
            }

            Cart::instance('sale')->destroy();
        });
    }


}
