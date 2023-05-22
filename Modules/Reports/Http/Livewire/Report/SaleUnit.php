<?php

namespace Modules\Reports\Http\Livewire\Report;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Sale\Entities\Sale;

class SaleUnit extends Component
{
    public $start_date;

    public $end_date;

    public $data = [];

    public $date = [];

    public $units;

    public $labels;

    public $rate;

    public function mount()
    {
        $this->start_date = today()->subDays(1)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');

        $totalQuantity = Sale::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->sum('sale_details.quantity');
        $this->units = $totalQuantity;
        $this->data = Sale::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->pluck('quantity')->toArray();
        // $this->data = array($totalQuantity);

        // $this->units = $totalQuantity;

        $this->date = Carbon::today()->addDay(6)->toArray();
    }

    public function render()
    {
        $sales = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->get();

        // $totalQuantity = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->sum('sale_details.quantity');
        // $units = $totalQuantity;

        return view('reports::livewire.report.sale-unit',[
            'data' => json_encode($this->data),
            'units' => $this->units,
            'date'  => $this->date,
            'sales' => $sales,

        ]);
    }
}
