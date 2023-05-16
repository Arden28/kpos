<?php

namespace Modules\Reports\Http\Livewire\Report;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Purchase\Entities\Purchase as EntitiesPurchase;
use Modules\PurchasesReturn\Entities\PurchaseReturn;

class Purchase extends Component
{

    public $data = [];

    public $purchase;

    public function mount(){
        $this->data = EntitiesPurchase::completed()->isCompany(Auth::user()->currentCompany->id)->orderBy('created_at')->pluck('total_amount')->toArray();

        $this->purchase = $this->getPurchase();
    }

    public function getPurchase(){

        // $current_company_id = Auth::user()->currentCompany->id;
        $purchases = EntitiesPurchase::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');
        $purchase_returns = PurchaseReturn::completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');
        $product_costs = 0;

        foreach (EntitiesPurchase::completed()->where('company_id', Auth::user()->currentCompany->id)->with('purchaseDetails')->get() as $purchase) {
            foreach ($purchase->purchaseDetails??[] as $purchaseDetail) {
                $product_costs += $purchaseDetail->product->product_cost;
            }
        }

        $revenue = ($purchases - $purchase_returns) / 100;
        $purchase =  $revenue;
        // $purchase = ($revenue - $product_costs) ;

        return $purchase;
    }
    public function render()
    {
        return view('reports::livewire.report.purchase',
            [
                'data' => json_encode($this->data),
                'purchase'  => $this->purchase,
            ]
        );
    }
}
