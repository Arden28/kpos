<?php

namespace Modules\Reports\Http\Livewire\Report;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Sale\Entities\Sale;

class SaleUnit extends Component
{
    public $data = [];

    public $date = [];

    public $units;

    public $labels;

    public $rate;

    public function mount()
    {
        // $totalQuantity = DB::table('sales')
        //            ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
        //            ->where('sales.company_id', Auth::user()->currentCompany->id)
        //            ->sum('sale_details.quantity');

        $totalQuantity = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->sum('sale_details.quantity');

        $this->data = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->pluck('quantity')->toArray();
        // $this->data = array($totalQuantity);

        $this->units = $totalQuantity;

        $this->date = Carbon::today()->addDay(6)->toArray();
    }

    public function render()
    {
        $sales = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->get();
        return view('reports::livewire.report.sale-unit',[
            'data' => json_encode($this->data),
            'units' => $this->units,
            'date'  => $this->date,
            'sales' => $sales,

        ]);
    }
}
