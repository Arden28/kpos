<?php

namespace Modules\Reports\Http\Livewire\Report;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Purchase\Entities\Purchase as EntitiesPurchase;
use Modules\PurchasesReturn\Entities\PurchaseReturn;

class Purchase extends Component
{

    public $data = [];

    public $start_date;

    public $end_date;

    public $purchase;

    public function mount(){

        $this->start_date = today()->subDays(1)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');

        $this->data = EntitiesPurchase::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->orderBy('created_at')->pluck('total_amount')->toArray();

        $this->purchase = $this->getPurchase();
    }

    public function getPurchase(){

        // $current_company_id = Auth::user()->currentCompany->id;
        $purchases = EntitiesPurchase::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');

        $purchase_returns = PurchaseReturn::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->sum('total_amount');

        $product_costs = 0;

        foreach (EntitiesPurchase::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->where('company_id', Auth::user()->currentCompany->id)->with('purchaseDetails')->get() as $purchase) {
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
