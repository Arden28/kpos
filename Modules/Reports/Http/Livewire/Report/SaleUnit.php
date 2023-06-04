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

    public $day;

    // public $message;

    public function mount()
    {
        // $this->start_date = today()->subDays(1)->format('Y-m-d');
        $this->start_date = today()->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
        $this->day = 1;


    }

    public function render()
    {
        $totalQuantity = Sale::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->sum('sale_details.quantity');
        $this->units = $totalQuantity;
        $this->data = Sale::whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)
        ->completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->pluck('quantity')->toArray();
        // $this->data = array($totalQuantity);

        // $this->units = $totalQuantity;

        $sales = Sale::completed()->whereDate('date', '>=', $this->start_date)
        ->whereDate('date', '<=', $this->end_date)->isCompany(Auth::user()->currentCompany->id)->get();

        $this->date = Carbon::today()->addDay(6)->toArray();

        // $totalQuantity = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')->sum('sale_details.quantity');
        // $units = $totalQuantity;

        return view('reports::livewire.report.sale-unit',[
            'data' => json_encode($this->data),
            'units' => $this->units,
            'date'  => $this->date,
            'sales' => $sales,

        ]);
    }

    public function today(){
        $this->start_date = today()->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
    }
    public function getYesterday(){
        $this->start_date = today()->subDays(1)->format('Y-m-d');
        $this->end_date = today()->subDays(1)->format('Y-m-d');
        $this->date = today()->subDay(6)->toArray();
    }

    public function getDays($days){
        $this->start_date = today()->subDays($days)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
    }

    public function pastWeek(){
        $this->start_date = today()->subDays(7)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
    }
}
