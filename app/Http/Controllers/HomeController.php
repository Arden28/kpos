<?php

namespace App\Http\Controllers;

use App\Interfaces\CompanyInterface;
use App\Traits\CompanySession;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Expense\Entities\Expense;
use Modules\Product\Entities\Product;
use Modules\Purchase\Entities\Purchase;
use Modules\Purchase\Entities\PurchasePayment;
use Modules\PurchasesReturn\Entities\PurchaseReturn;
use Modules\PurchasesReturn\Entities\PurchaseReturnPayment;
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SalePayment;
use Modules\SalesReturn\Entities\SaleReturn;
use Modules\SalesReturn\Entities\SaleReturnPayment;
use Bmatovu\MtnMomo\Products\Collection;
use Bmatovu\MtnMomo\Exceptions\CollectionRequestException;
use Illuminate\Support\Facades\Mail;
use Modules\User\Emails\Employees\WelcomeEmail;

class HomeController extends Controller
{
    use CompanySession;


    public function __construct(){

        // $this->middleware(['subscribed']);
    }

    public function sendSms(){
        $basic  = new \Nexmo\Client\Credentials\Basic('97a80ea4', 'NGTSTI4BuTci65He');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '242064074926',
            'from' => 'Koverae',
            'text' => 'Un simple message de test envoyé par Koverae'
        ]);

        $message = $response->current();

        if ($message->getStatus() == 0) {
            dd("The message was sent successfully\n");
        } else {
            dd("The message failed with status: " . $message->getStatus() . "\n");
        }
    }
/**
 *
 * DASHBOARD
 *
 */
public function index()
{

    // $current_company_id = Auth::user()->currentCompany->id;
    $sales = Sale::completed()->where('company_id', Auth::user()->currentCompany->id)->sum('total_amount');
    $sale_returns = SaleReturn::completed()->where('company_id', Auth::user()->currentCompany->id)->sum('total_amount');
    $purchase_returns = PurchaseReturn::completed()->where('company_id', Auth::user()->currentCompany->id)->sum('total_amount');
    $product_costs = 0;

    foreach (Sale::completed()->where('company_id', Auth::user()->currentCompany->id)->with('saleDetails')->get() as $sale) {
        foreach ($sale->saleDetails??[] as $saleDetail) {
            $product_costs += $saleDetail->product->product_cost;
        }
    }

    $revenue = ($sales - $sale_returns) / 100;
    $profit = ($revenue - $product_costs);

    return view('home', [
    'revenue'          => $revenue,
    'sale_returns'     => $sale_returns / 100,
    'purchase_returns' => $purchase_returns / 100,
    'profit'           => $profit
]);
}


public function currentMonthChart() {
    abort_if(!request()->ajax(), 404);

    $currentMonthSales = Sale::where('company_id', Auth::user()->currentCompany->id)->where('status', 'Completed')->whereMonth('date', date('m'))
            ->whereYear('date', date('Y'))
            ->sum('total_amount') / 100;
    $currentMonthPurchases = Purchase::where('company_id', Auth::user()->currentCompany->id)->where('status', 'Completed')->whereMonth('date', date('m'))
            ->whereYear('date', date('Y'))
            ->sum('total_amount') / 100;
    $currentMonthExpenses = Expense::where('company_id', Auth::user()->currentCompany->id)->whereMonth('date', date('m'))
            ->whereYear('date', date('Y'))
            ->sum('amount') / 100;

    return response()->json([
        'sales'     => $currentMonthSales,
        'purchases' => $currentMonthPurchases,
        'expenses'  => $currentMonthExpenses
    ]);
}


public function salesPurchasesChart() {
    abort_if(!request()->ajax(), 404);

    $sales = $this->salesChartData();
    $purchases = $this->purchasesChartData();

    return response()->json(['sales' => $sales, 'purchases' => $purchases]);
}


public function paymentChart() {
    abort_if(!request()->ajax(), 404);

    $dates = collect();
    foreach (range(-11, 0) as $i) {
        $date = Carbon::now()->addMonths($i)->format('m-Y');
        $dates->put($date, 0);
    }

    $date_range = Carbon::today()->subYear()->format('Y-m-d');

    $sale_payments = SalePayment::where('date', '>=', $date_range)
        ->where('company_id', Auth::user()->currentCompany->id)
        ->select([
            DB::raw("DATE_FORMAT(date, '%m-%Y') as month"),
            DB::raw("SUM(amount) as amount")
        ])
        ->groupBy('month')->orderBy('month')
        ->get()->pluck('amount', 'month');

    $sale_return_payments = SaleReturnPayment::where('date', '>=', $date_range)
        ->where('company_id', Auth::user()->currentCompany->id)
        ->select([
            DB::raw("DATE_FORMAT(date, '%m-%Y') as month"),
            DB::raw("SUM(amount) as amount")
        ])
        ->groupBy('month')->orderBy('month')
        ->get()->pluck('amount', 'month');

    $purchase_payments = PurchasePayment::where('date', '>=', $date_range)
        ->where('company_id', Auth::user()->currentCompany->id)
        ->select([
            DB::raw("DATE_FORMAT(date, '%m-%Y') as month"),
            DB::raw("SUM(amount) as amount")
        ])
        ->groupBy('month')->orderBy('month')
        ->get()->pluck('amount', 'month');

    $purchase_return_payments = PurchaseReturnPayment::where('date', '>=', $date_range)
        ->where('company_id', Auth::user()->currentCompany->id)
        ->select([
            DB::raw("DATE_FORMAT(date, '%m-%Y') as month"),
            DB::raw("SUM(amount) as amount")
        ])
        ->groupBy('month')->orderBy('month')
        ->get()->pluck('amount', 'month');

    $expenses = Expense::where('company_id', Auth::user()->currentCompany->id)->where('date', '>=', $date_range)
        ->where('company_id', Auth::user()->currentCompany->id)
        ->select([
            DB::raw("DATE_FORMAT(date, '%m-%Y') as month"),
            DB::raw("SUM(amount) as amount")
        ])
        ->groupBy('month')->orderBy('month')
        ->get()->pluck('amount', 'month');

    $payment_received = array_merge_numeric_values($sale_payments, $purchase_return_payments);
    $payment_sent = array_merge_numeric_values($purchase_payments, $sale_return_payments, $expenses);

    $dates_received = $dates->merge($payment_received);
    $dates_sent = $dates->merge($payment_sent);

    $received_payments = [];
    $sent_payments = [];
    $months = [];

    foreach ($dates_received as $key => $value) {
        $received_payments[] = $value;
        $months[] = $key;
    }

    foreach ($dates_sent as $key => $value) {
        $sent_payments[] = $value;
    }

    return response()->json([
        'payment_sent' => $sent_payments,
        'payment_received' => $received_payments,
        'months' => $months,
    ]);
}

public function salesChartData() {
    $dates = collect();
    foreach (range(-6, 0) as $i) {
        $date = Carbon::now()->addDays($i)->format('d-m-y');
        $dates->put($date, 0);
    }

    $date_range = Carbon::today()->subDays(6);

    $sales = Sale::where('company_id', Auth::user()->currentCompany->id)->where('status', 'Completed')
        ->where('date', '>=', $date_range)
        ->groupBy(DB::raw("DATE_FORMAT(date,'%d-%m-%y')"))
        ->orderBy('date')
        ->get([
            DB::raw(DB::raw("DATE_FORMAT(date,'%d-%m-%y') as date")),
            DB::raw('SUM(total_amount) AS count'),
        ])
        ->pluck('count', 'date');

    $dates = $dates->merge($sales);

    $data = [];
    $days = [];
    foreach ($dates as $key => $value) {
        $data[] = $value / 100;
        $days[] = $key;
    }

    return response()->json(['data' => $data, 'days' => $days]);
}


public function purchasesChartData() {
    $dates = collect();
    foreach (range(-6, 0) as $i) {
        $date = Carbon::now()->addDays($i)->format('d-m-y');
        $dates->put($date, 0);
    }

    $date_range = Carbon::today()->subDays(6);

    $purchases = Purchase::where('company_id', Auth::user()->currentCompany->id)->where('status', 'Completed')
        ->where('date', '>=', $date_range)
        ->groupBy(DB::raw("DATE_FORMAT(date,'%d-%m-%y')"))
        ->orderBy('date')
        ->get([
            DB::raw(DB::raw("DATE_FORMAT(date,'%d-%m-%y') as date")),
            DB::raw('SUM(total_amount) AS count'),
        ])
        ->pluck('count', 'date');

    $dates = $dates->merge($purchases);

    $data = [];
    $days = [];
    foreach ($dates as $key => $value) {
        $data[] = $value / 100;
        $days[] = $key;
    }

    return response()->json(['data' => $data, 'days' => $days]);

}





}
