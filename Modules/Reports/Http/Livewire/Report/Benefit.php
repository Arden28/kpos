<?php

namespace Modules\Reports\Http\Livewire\Report;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Expense\Entities\Expense;
use Modules\Purchase\Entities\Purchase;
use Modules\PurchasesReturn\Entities\PurchaseReturn;
use Modules\Sale\Entities\Sale;
use Modules\SalesReturn\Entities\SaleReturn;

class Benefit extends Component
{
    public $start_date;

    public $end_date;

    public $benefit;


    public function mount(){

        // $this->start_date = today()->subDays(1)->format('Y-m-d');
        $this->start_date = today()->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
    }


    public function today(){
        $this->start_date = today()->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
    }
    public function getYesterday(){
        $this->start_date = today()->subDays(1)->format('Y-m-d');
        $this->end_date = today()->subDays(1)->format('Y-m-d');
    }

    public function getDays($days){
        $this->start_date = today()->subDays($days)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
    }

    public function pastWeek(){
        $this->start_date = today()->subDays(7)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
    }

    public function getProfit(){
        // Get revenue
        $sales = Sale::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->where('company_id', Auth::user()->currentCompany->id)->sum('total_amount');
        $sale_returns = SaleReturn::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->where('company_id', Auth::user()->currentCompany->id)->sum('total_amount');

        $product_costs = 0;

        foreach (Sale::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->where('company_id', Auth::user()->currentCompany->id)->with('saleDetails')->get() as $sale) {
            foreach ($sale->saleDetails??[] as $saleDetail) {
                $product_costs += $saleDetail->product->product_cost * $saleDetail->quantity;
            }
        }

        $revenue = ($sales - $sale_returns) / 100;
        // $revenue_net = ($revenue);
        $revenue_net = ($revenue - $product_costs);



        // $current_company_id = Auth::user()->currentCompany->id;
        $purchases = Purchase::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');

        $purchase_returns = PurchaseReturn::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');

        $purchase_product_costs = 0;

        foreach (Purchase::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->where('company_id', Auth::user()->currentCompany->id)->with('purchaseDetails')->get() as $purchase) {
            foreach ($purchase->purchaseDetails??[] as $purchaseDetail) {
                $purchase_product_costs += $purchaseDetail->product->product_cost * $purchaseDetail->quantity;
            }
        }

        $purchase = ($purchases - $purchase_returns) / 100;
        $purchase_net = ($purchase_product_costs);
        // $purchase_net = ($purchase - $purchase_product_costs) ;


        // Expenses
        $expenses = Expense::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->isCompany(Auth::user()->currentCompany->id)->sum('amount') / 100;

        $expense_net = ($purchase_net + $expenses);

        $profit = ($revenue_net - $expense_net);
        // $profit = $revenue_net;
        // $profit = $product_costs;

        return $profit;

    }

    public function render()
    {
        $this->benefit = $this->getProfit();

        return view('reports::livewire.report.benefit', [
            'benefit' => $this->benefit,
        ]);
    }
}
