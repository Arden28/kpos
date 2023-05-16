<?php

namespace Modules\Reports\Http\Livewire\Report;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
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

        $revenue = ($sales - $sale_returns);
        $revenue_net = ($revenue - $product_costs) / 100;



        // $current_company_id = Auth::user()->currentCompany->id;
        $purchases = Purchase::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');
        $purchase_returns = PurchaseReturn::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');

        $purchase = ($purchases - $purchase_returns) / 100;
        $purchase_net = ($purchase - $product_costs) ;

        $profit = $revenue_net - $purchase_net;
        $profit = $product_costs;

        return $profit;

    }

    public function render()
    {
        return view('reports::livewire.report.benefit', [
            'benefit' => $this->benefit,
        ]);
    }
}
