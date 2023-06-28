<?php

namespace Modules\Inventory\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Interfaces\CategoryInterface;
use Modules\Inventory\Interfaces\ProductInterface;
use Modules\People\DataTables\SuppliersDataTable;
use Modules\Sale\Entities\Sale;

class InventoryController extends Controller
{
    protected $productRepository;

    protected $categoryRepository;


    public function __construct(CategoryInterface $categoryRepository, ProductInterface $productRepository){

        $this->productRepository = $productRepository;

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('access_products'), 403);

        $products = $this->productRepository->getProducts(Auth::user()->currentCompany->id);

        $categories = $this->categoryRepository->getCategories(Auth::user()->currentCompany->id);

        return view('inventory::index', compact('products', 'categories'));
    }

    // Supplier Inventory
    public function supplier(SuppliersDataTable $dataTable) {

        return $dataTable->render('inventory::suppliers.index');
    }

    // Statistics Inventory

    public function orderTrackingChartData() {
        $dates = collect();
        foreach (range(-6, 0) as $i) {
            $date = Carbon::now()->addDays($i)->format('d-m-y');
            $dates->put($date, 0);
        }

        $date_range = Carbon::today()->subDays(6);

        // $sales = Sale::isCompany(Auth::user()->currentCompany->id)->completed()
        //     ->where('date', '>=', $date_range)
        //     ->groupBy(DB::raw("DATE_FORMAT(date,'%d-%m-%y')"))
        //     ->get([
        //         DB::raw(DB::raw("DATE_FORMAT(date,'%d-%m-%y') as date")),
        //         DB::raw('SUM(total_amount) AS count'),
        //     ])
        //     ->pluck('count', 'date');

        $sales = Sale::isCompany(Auth::user()->currentCompany->id)->completed()
            ->where('date', '>=', $date_range)
            ->groupBy(DB::raw("DATE_FORMAT(date,'%d-%m-%y')"))
            ->orderBy('date')
            ->join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
            ->select(
                        DB::raw("DATE_FORMAT(date,'%d-%m-%y') as date"),
                        DB::raw('SUM(sale_details.quantity) AS count')
                    )
            ->get()
            ->pluck('count', 'date');

        $dates = $dates->merge($sales);

        $data = [];
        $days = [];
        foreach ($dates as $key => $value) {
            $data[] = $value;
            $days[] = $key;
        }

        return response()->json(['data' => $data, 'days' => $days]);
    }

}
