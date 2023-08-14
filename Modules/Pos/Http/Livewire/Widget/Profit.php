<?php

namespace Modules\Pos\Http\Livewire\Widget;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Product\Entities\Product;

class Profit extends Component
{

    public $pos;

    public $start_date;

    public $end_date;

    public $products = [];

    public $totalStockValue = 0;

    public $sales;

    public $pos_session;


    public function mount()
    {
        $this->pos_session = PhysicalPosSession::isActive()->find($this->pos->current_pos_session_id);
        $pos_session = $this->pos_session;

        if ($pos_session) {
            $this->start_date = $pos_session->start_date->format('d-m-Y H:i:s');

            if ($this->end_date === null) {
                $this->end_date = now()->format('d-m-Y H:i:s');
            } else {
                // Assuming $this->end_date is in a different format, parse and format it
                $this->end_date = $pos_session->end_date->format('d-m-Y H:i:s');
            }
        }
    }

    public function calculateTotal($value)
    {
        $this->products = Product::isCompany(Auth::user()->currentCompany->id)->IsStorable()->get();
        if($value == 'price'){
            return $this->totalStockValue = $this->calculateSaleStockValue($this->products);
        }elseif($value == 'cost'){
            return $this->totalStockValue = $this->calculatePurchaseStockValue($this->products);
        }
    }


    public function calculateSaleStockValue($products)
    {
        return $products->sum(function ($product) {
            return $product->product_price * $product->product_quantity;
        });
    }

    public function calculatePurchaseStockValue($products)
    {
        return $products->sum(function ($product) {
            return $product->product_cost * $product->product_quantity;
        });
    }

    public function render()
    {
        $endSaleValue = $this->calculateTotal('price');
        $endPurchaseValue = $this->calculateTotal('cost');
        $startSaleValue = $this->pos_session->start_stock_price_value;
        $startPurchaseValue = $this->pos_session->start_stock_cost_value;
        // dd($this->pos_session);
        // dd($saleValue);
        return view('pos::livewire.widget.profit', compact('startSaleValue','startPurchaseValue','endSaleValue', 'endPurchaseValue'));
    }
}
