<?php

namespace Modules\Reports\Http\Livewire\Report;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\PurchasesReturn\Entities\PurchaseReturn;
use Modules\Sale\Entities\Sale;
use Modules\SalesReturn\Entities\SaleReturn;

class Revenue extends Component
{
    // public $data = [5, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 1, 67];
    public $data = [];

    public $start_date;

    public $end_date;

    public $days = [];

    public $labels;

    public $revenue;

    public $rate;

    public function mount()
    {

        $this->labels = [
            '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
        ];

        // $this->start_date = today()->subDays(1)->format('Y-m-d');
        $this->start_date = today()->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');

    }

    public function getLabels()
    {
        $labels = [];

        for ($i = 0; $i < 60; $i++) {
            $time = Carbon::now()->subSeconds($i);
            if ($i % 5 == 0) {
                $labels[] = $time->format('d M Y');
            } else {
                $labels[] = '';
            }
        }

        return array_reverse($labels);
    }

    public function updateData()
    {
        $this->data = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->pluck('total_amount')->toArray();
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

    public function render()
    {


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
                $product_costs += $saleDetail->product->product_cost;
            }
        }

        $revenue = ($sales - $sale_returns) / 100;
        // $revenue = ($revenue - $product_costs);

        $this->revenue = $revenue;
        $this->data = Sale::completed()->isCompany(Auth::user()->currentCompany->id)->orderBy('created_at', 'DESC')->pluck('total_amount')->toArray();

        return view('reports::livewire.report.revenue', [
            'data' => json_encode($this->data),
            'revenue' => $this->revenue,
            'labels' => $this->getLabels(),
        ]);
    }
}
