<?php

namespace Modules\Sale\Http\Controllers;

use App\Traits\CompanySession;
use Modules\Sale\DataTables\SalesDataTable;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\FieldOfService\DataTables\ServiceDataTable;
use Modules\Financial\Interfaces\Accounting\AccountInterface;
use Modules\Inventory\DataTables\ProductDataTable;
use Modules\People\DataTables\CustomersDataTable;
use Modules\People\Entities\Customer;
use Modules\Product\Entities\Product;
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SaleDetails;
use Modules\Sale\Entities\SalePayment;
use Modules\Sale\Http\Requests\StoreSaleRequest;
use Modules\Sale\Http\Requests\UpdateSaleRequest;
use Modules\Sale\Interfaces\SaleInterface;

class SaleController extends Controller
{
    use CompanySession;

    protected $saleRepository;

    protected $accountRepository;

    public function __construct(SaleInterface $saleRepository, AccountInterface $accountRepository){

        $this->saleRepository = $saleRepository;
        $this->accountRepository = $accountRepository;

    }


    public function index(SalesDataTable $dataTable) {
        abort_if(Gate::denies('access_sales'), 403);

        return $dataTable->render('sale::index');
    }


    public function create() {
        abort_if(Gate::denies('create_sales'), 403);

        Cart::instance('sale')->destroy();

        $customers = Customer::isCompany(Auth::user()->currentCompany->id)->orderBy('id', 'DESC')->get();
        $accounts = $this->accountRepository->getCompanyAccounts(Auth::user()->currentCompany->id);

        return view('sale::create', compact('accounts', 'customers'));
    }


    public function store(StoreSaleRequest $request) {

        // Add Sale
        $this->saleRepository->addSale($request->validated());

        toast('Vente enregistrée!', 'success');

        return redirect()->route('sales.index');
    }


    public function show(Sale $sale) {
        abort_if(Gate::denies('show_sales'), 403);

        $customer = Customer::findOrFail($sale->customer_id);

        return view('sale::show', compact('sale', 'customer'));
    }


    public function edit(Sale $sale) {
        abort_if(Gate::denies('edit_sales'), 403);

        $sale_details = $sale->saleDetails;

        Cart::instance('sale')->destroy();

        $cart = Cart::instance('sale');

        foreach ($sale_details as $sale_detail) {
            $cart->add([
                'id'      => $sale_detail->product_id,
                'name'    => $sale_detail->product_name,
                'qty'     => $sale_detail->quantity,
                'price'   => $sale_detail->price,
                'weight'  => 1,
                'options' => [
                    'product_discount' => $sale_detail->product_discount_amount,
                    'product_discount_type' => $sale_detail->product_discount_type,
                    'sub_total'   => $sale_detail->sub_total,
                    'code'        => $sale_detail->product_code,
                    'stock'       => Product::findOrFail($sale_detail->product_id)->product_quantity,
                    'product_tax' => $sale_detail->product_tax_amount,
                    'unit_price'  => $sale_detail->unit_price
                ]
            ]);
        }

        return view('sale::edit', compact('sale'));
    }


    public function update(UpdateSaleRequest $request, Sale $sale) {

        // Edit Sale
        $this->saleRepository->updateSale($request->validated(), $sale);

        toast('Vente modifiée!', 'info');

        return redirect()->route('sales.index');
    }


    public function destroy(Sale $sale) {
        abort_if(Gate::denies('delete_sales'), 403);

        $sale->delete();

        toast(__('Votre vente a bien été supprimée!'), 'warning');

        return redirect()->route('sales.index');
    }

    // Customers
    public function customer(CustomersDataTable $dataTable) {

        return $dataTable->render('sale::customers.index');
    }

    // Products
    public function product(ProductDataTable $dataTable) {

        return $dataTable->render('sale::products.index');
    }


    // Products
    public function service(ServiceDataTable $dataTable) {

        return $dataTable->render('sale::products.service');
    }

}
