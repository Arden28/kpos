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
                $product_costs += $saleDetail->product->product_cost * $saleDetail->quantity;
            }
        }

        $revenue = ($sales - $sale_returns) / 100;
        // $revenue_net = ($revenue);
        $revenue_net = ($revenue - $product_costs);



        // $current_company_id = Auth::user()->currentCompany->id;
        $purchases = Purchase::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');
        $purchase_returns = PurchaseReturn::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');
        $purchase_product_costs = 0;

        foreach (Purchase::completed()->where('company_id', Auth::user()->currentCompany->id)->with('purchaseDetails')->get() as $purchase) {
            foreach ($purchase->purchaseDetails??[] as $purchaseDetail) {
                $purchase_product_costs += $purchaseDetail->product->product_cost * $purchaseDetail->quantity;
            }
        }

        $purchase = ($purchases - $purchase_returns) / 100;
        $purchase_net = ($purchase_product_costs);
        // $purchase_net = ($purchase - $purchase_product_costs) ;


        // Expenses
        $expenses = Expense::isCompany(Auth::user()->currentCompany->id)->sum('amount') / 100;
        $expense_net = ($purchase_net + $expenses);

        $profit = ($revenue_net - $expense_net);
        // $profit = $revenue_net;
        // $profit = $product_costs;

        return $profit;

    }

    public function render()
    {
        return view('reports::livewire.report.benefit', [
            'benefit' => $this->benefit,
        ]);
    }
}
