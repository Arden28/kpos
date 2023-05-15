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
    public $benefit;


    public function mount(){
        $this->benefit = $this->getProfit();
    }

    public function getProfit(){
        // Get revenue
        $sales = Sale::completed()->where('company_id', Auth::user()->currentCompany->id)->sum('total_amount');
        $sale_returns = SaleReturn::completed()->where('company_id', Auth::user()->currentCompany->id)->sum('total_amount');
        $product_costs = 0;

        foreach (Sale::completed()->where('company_id', Auth::user()->currentCompany->id)->with('saleDetails')->get() as $sale) {
            foreach ($sale->saleDetails??[] as $saleDetail) {
                $product_costs += $saleDetail->product->product_cost;
            }
        }

        $revenue_net = ($sales - $sale_returns);

        // Purchase
        $purchases = Purchase::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');
        $purchase_returns = PurchaseReturn::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');
        $product_costs = 0;

        foreach (Purchase::completed()->where('company_id', Auth::user()->currentCompany->id)->with('purchaseDetails')->get() as $purchase) {
            foreach ($purchase->purchaseDetails??[] as $purchaseDetail) {
                $product_costs += $purchaseDetail->product->product_cost;
            }
        }

        $purchase_net = ($purchases - $purchase_returns);

        // Dépense
        $expenses = Expense::where('company_id', Auth::user()->currentCompany->id)->sum('amount');

        // Profit
        $profit = ($revenue_net - $expenses - $purchase_net) / 100;
        return $profit;

    }

    public function render()
    {
        return view('reports::livewire.report.benefit', [
            'benefit' => $this->benefit,
        ]);
    }
}
