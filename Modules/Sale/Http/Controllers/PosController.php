<?php

namespace Modules\Sale\Http\Controllers;

use App\Traits\CompanySession;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\People\Entities\Customer;
use Modules\Pos\Http\Requests\StorePosSaleRequest as RequestsStorePosSaleRequest;
use Modules\Pos\Interfaces\PosInterface;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SaleDetails;
use Modules\Sale\Entities\SalePayment;
use Modules\Sale\Http\Requests\StorePosSaleRequest;
use Modules\Sale\Interfaces\SaleInterface;

class PosController extends Controller
{
    use CompanySession;

    protected $saleRepository;
    protected $posRepository;

    public function __construct(SaleInterface $saleRepository, PosInterface $posRepository){

        $this->saleRepository = $saleRepository;
        $this->posRepository = $posRepository;
    }

    public function index() {
        Cart::instance('sale')->destroy();

        $customers = Customer::where('company_id', Auth::user()->currentCompany->id)->get();
        $product_categories = Category::all();

        return view('sale::pos.index', compact('product_categories', 'customers'));
    }


    public function store(RequestsStorePosSaleRequest $request) {

        // Add POS Purchase
        $this->saleRepository->addSale($request->validated());
        toast('POS Sale Created!', 'success');

        return redirect()->route('sales.index');
    }


}
