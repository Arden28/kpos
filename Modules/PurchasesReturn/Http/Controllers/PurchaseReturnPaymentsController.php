<?php

namespace Modules\PurchasesReturn\Http\Controllers;

use App\Traits\CompanySession;
use Modules\PurchasesReturn\DataTables\PurchaseReturnPaymentsDataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\Financial\Entities\Accounting\AccountBook;
use Modules\PurchasesReturn\Entities\PurchaseReturn;
use Modules\PurchasesReturn\Entities\PurchaseReturnPayment;

class PurchaseReturnPaymentsController extends Controller
{
    use CompanySession;

    public function index($purchase_return_id, PurchaseReturnPaymentsDataTable $dataTable) {
        abort_if(Gate::denies('access_purchase_return_payments'), 403);

        $purchase_return = PurchaseReturn::findOrFail($purchase_return_id);

        return $dataTable->render('purchasesreturn::payments.index', compact('purchase_return'));
    }


    public function create($purchase_return_id) {
        abort_if(Gate::denies('access_purchase_return_payments'), 403);

        $purchase_return = PurchaseReturn::findOrFail($purchase_return_id);

        return view('purchasesreturn::payments.create', compact('purchase_return'));
    }


    public function store(Request $request) {
        abort_if(Gate::denies('access_purchase_return_payments'), 403);

        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'note' => 'nullable|string|max:1000',
            'purchase_return_id' => 'required',
            'payment_method' => 'required|string|max:255'
        ]);

        DB::transaction(function () use ($request) {
            PurchaseReturnPayment::create([

                'company_id' => Auth::user()->currentCompany->id,

                'date' => $request->date,
                'reference' => $request->reference,
                'amount' => $request->amount,
                'note' => $request->note,
                'purchase_return_id' => $request->purchase_return_id,
                'payment_method' => $request->payment_method
            ]);

            $purchase_return = PurchaseReturn::findOrFail($request->purchase_return_id);

            $due_amount = $purchase_return->due_amount - $request->amount;

            if ($due_amount == $purchase_return->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $purchase_return->update([
                'paid_amount' => ($purchase_return->paid_amount + $request->amount) * 100,
                'due_amount' => $due_amount * 100,
                'payment_status' => $payment_status
            ]);

            // Register to the book.
            if($purchase_return){
                $current_balance = $purchase_return->account->balance;

                if($due_amount > 0){
                    $detail = 'Achat(Paiement Avancé. Reste: '.format_currency($due_amount).')';
                }else{
                    $detail = 'Achat(Paiement Complété)';
                }

                $book = AccountBook::create([
                    'company_id' => Auth::user()->currentCompany->id,
                    'account_id' => $purchase_return->account_id,
                    'user_id' => Auth::user()->id,
                    'detail' => $detail,
                    'note' => $request->note,
                    'balance' => $request->paid_amount,
                    'debit' => $request->paid_amount,
                    'date' => now()->format('d-m-Y H:i:s'),
                ]);

                $book->save();

                $new_balance = $current_balance - $book->balance;

                $purchase_return->account->balance = $new_balance;
                $purchase_return->account->save();

                $book->balance = $new_balance;
                $book->save();
            }
        });

        toast('Paiement ajouté!', 'success');

        return redirect()->route('purchase-returns.index');
    }


    public function edit($purchase_return_id, PurchaseReturnPayment $purchaseReturnPayment) {
        abort_if(Gate::denies('access_purchase_return_payments'), 403);

        $purchase_return = PurchaseReturn::findOrFail($purchase_return_id);

        return view('purchasesreturn::payments.edit', compact('purchaseReturnPayment', 'purchase_return'));
    }


    public function update(Request $request, PurchaseReturnPayment $purchaseReturnPayment) {
        abort_if(Gate::denies('access_purchase_return_payments'), 403);

        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'note' => 'nullable|string|max:1000',
            'purchase_return_id' => 'required',
            'payment_method' => 'required|string|max:255'
        ]);

        DB::transaction(function () use ($request, $purchaseReturnPayment) {
            $purchase_return = $purchaseReturnPayment->purchaseReturn;

            $due_amount = ($purchase_return->due_amount + $purchaseReturnPayment->amount) - $request->amount;

            if ($due_amount == $purchase_return->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $purchase_return->update([
                'paid_amount' => (($purchase_return->paid_amount - $purchaseReturnPayment->amount) + $request->amount) * 100,
                'due_amount' => $due_amount * 100,
                'payment_status' => $payment_status
            ]);

            $purchaseReturnPayment->update([
                'date' => $request->date,
                'reference' => $request->reference,
                'amount' => $request->amount,
                'note' => $request->note,
                'purchase_return_id' => $request->purchase_return_id,
                'payment_method' => $request->payment_method
            ]);
        });

        toast('Purchase Return Payment Updated!', 'info');

        return redirect()->route('purchase-returns.index');
    }


    public function destroy(PurchaseReturnPayment $purchaseReturnPayment) {
        abort_if(Gate::denies('access_purchase_return_payments'), 403);

        $purchaseReturnPayment->delete();

        toast('Purchase Return Payment Deleted!', 'warning');

        return redirect()->route('purchase-returns.index');
    }
}
