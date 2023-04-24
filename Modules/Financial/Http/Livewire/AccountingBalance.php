<?php

namespace Modules\Financial\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Purchase\Entities\Purchase;
use Modules\Sale\Entities\Sale;

class AccountingBalance extends Component
{
    public $supplier_debt;

    public $client_debt;

    public $credit;

    public $debit;

    public $date;

    public function mount(){
        $this->date = now();
    }

    public function render()
    {


        $this->client_debt = $this->calculateClientDebt();

        $this->supplier_debt = $this->calculateSupplierDebt();

        $accounts = Account::where('company_id', Auth::user()->currentCompany->id)
            ->orderBy('created_at', 'desc')->get();

        $this->credit = $this->calculateTotalCredit($accounts);

        $this->debit = $this->calculateTotalDebit();

        return view('financial::livewire.accounting-balance', [
            'accounts' => $accounts,
        ]);
    }

    public function calculateClientDebt(){

        $due_sales = 0;

        $sales = Sale::completed()
            ->where('company_id', Auth::user()->currentCompany->id)
            ->sum('due_amount') / 100;


        $debt = $sales;

        return $debt;
    }
    public function calculateSupplierDebt(){

        $due_purchases = 0;

        $purchases = Purchase::where('company_id', Auth::user()->currentCompany->id)
            ->sum('due_amount') / 100;


        $debt = $purchases;

        return $debt;
    }

    public function calculateTotalCredit($accounts){
        $credit = $accounts->sum('balance') + $this->client_debt;
        return $credit;
    }

    public function calculateTotalDebit(){
        $debit = $this->supplier_debt;
        return $debit;
    }

}
