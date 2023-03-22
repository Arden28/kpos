<?php

namespace Modules\Pos\Repositories;

use App\Models\Company;
use App\Traits\CompanySession;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Pos\Interfaces\PosInterface;
use Modules\Sale\Http\Requests\StorePosSaleRequest;
use Modules\People\Entities\Customer;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Entities\PosSale;
use Modules\Pos\Traits\PosSession;
use Modules\Product\Entities\Product;
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SaleDetails;
use Modules\Sale\Entities\SalePayment;
use Ramsey\Uuid\Uuid;

class PosRepository implements PosInterface
{
    use CompanySession, PosSession;

    public function getAllPos($company){

        return Pos::where('company_id', $company)->get();

    }

    public function getLatestPosSession($pos){

        return PhysicalPosSession::where('pos_id', $pos)->latest()->first();

    }

    public function createPhysicalPos($request, $company){

            $code = Uuid::uuid4();

            $pos = Pos::create([
                'name' => $request['name'],
                'code' => $code,
                'address' => $request['address'],
                'company_id' => $company,
            ]);
            $pos->save();

    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function createPos($request, $pos)
    {
            DB::transaction(function () use ($request, $pos) {
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
                    // 'pos_id' => $pos,
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
                    'seller_id' => Auth::user()->currentCompany->id, //Rendre dynamique
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

                // Create POS sale
                $this->createPosSale($pos, $sale->id, Auth::user()->currentCompany->id, Auth::user()->id);
            });

    }

    // Session

    // public function getLatestPos() {
    //     $pos_id = session('pos_id');
    //     $pos_session = PhysicalPosSession::where('pos_id', $pos_id)
    //                 ->where('company_id', Auth::user()->currentCompany->id)
    //                     ->latest()->first();
    //     $pos = Pos::where('id', $pos_session->pos_id)
    //                 ->where('company_id', $pos_session->company_id)
    //                     ->latest()->first();
    //     if($pos){
    //         return $pos;
    //     } else {
    //         return (object) ['id' => 0];
    //     }
    // }

    public function editPos($request, $pos){

        DB::transaction(function () use ($request, $pos) {

            $pos->update([
                'name' => $request['name'],
                'address' => $request['address'],
            ]);

        });
    }

    public function currentPos() {
        $pos_id = session('pos_id');
        $pos_session = PhysicalPosSession::where('pos_id', $pos_id)
                    ->where('company_id', Auth::user()->currentCompany->id)
                        ->latest()->first();
        return Pos::where('id', $pos_session->pos_id)
                    ->where('company_id', $pos_session->company_id)
                        ->latest()->first();

    }

    public function startNewSession($request){


        $pos = PhysicalPosSession::create([
            'pos_id'=> $request['pos_id'],
            'user_id' => $request['user_id'],
        ]);
        $pos->save();

    }

    // Pos Sales
    public function createPosSale($pos, $sale, $company, $cashier){
        PosSale::create([
            'pos_id' => $pos,
            'sale_id' => $sale,
            'company_id' => $company,
            'cashier_id' => $cashier,
        ]);
    }

}
