<?php

namespace Modules\Pos\Http\Controllers;

use App\Models\Company;
use App\Traits\CompanySession;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Financial\Interfaces\Accounting\AccountInterface;
use Modules\People\DataTables\CustomersDataTable;
use Modules\People\Entities\Customer;
use Modules\People\Interfaces\CustomerInterface;
use Modules\Pos\DataTables\PosDataTable;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Http\Requests\Physical\UpdatePosPhysicalRequest;
use Modules\Pos\Http\Requests\StorePosPhysicalRequest;
use Modules\Pos\Http\Requests\StorePosSaleRequest;
use Modules\Pos\Http\Requests\StorePosSessionRequest;
use Modules\Pos\Interfaces\PosInterface;
use Modules\Pos\Traits\HasPos;
use Modules\Pos\Traits\PosSession;
use Modules\Product\Entities\Category;

class PosController extends Controller
{
    use CompanySession, PosSession, HasPos;

    protected $posRepository;

    protected $customerRepository;

    protected $accountRepository;

    public function __construct(PosInterface $posRepository, CustomerInterface $customerRepository, AccountInterface $accountRepository){

        // If the customer has a standard plan
        $this->middleware(['subscribed.standard']);

        $this->posRepository = $posRepository;
        $this->customerRepository = $customerRepository;
        $this->accountRepository = $accountRepository;
    }


    public function dashboard(){

        $company_id = Auth::user()->currentCompany->id;

        // $pos = $this->posRepository->getAllPos($company_id);
        $pos = Auth::user()->currentCompany->pos;


        return view('pos::dashboard', compact('pos'));
    }

    public function listPos(PosDataTable $dataTable) {
        abort_if(Gate::denies('access_pos'), 403);

        return $dataTable->render('pos::pos.list');
    }

    // public function singlePosSession(SinglePosSessionDataTable $dataTable) {
    //     abort_if(Gate::denies('access_product_categories'), 403);

    //     return $dataTable->render('pos::pos.list');
    // }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index() {
        Cart::instance('sale')->destroy();

        $company_id = Auth::user()->currentCompany->id;

        // Le Point de vente auquel appartient la session | The POS in which belongs pos_session
        $physical = Pos::find(session('pos_id'))->first();
        // $physical = Pos::where('id', $pos_id)->where('company_id', $company_id)->first();
        // $physical = $this->getCurrentPos();

        // La session en cours | The current session
        $pos = $physical->currentPosSession();
        // $pos = PhysicalPosSession::where('pos_id', $physical['id'])->latest()->first();
        // $pos = $physical->currentPosSession();
        // Get Customer depends on the current company
        $customers = $this->customerRepository->getCustomers($company_id);

        $product_categories = Category::all();

        return view('pos::index', compact('product_categories', 'customers','physical', 'pos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createPhysical()
    {
        $accounts = $this->accountRepository->getCompanyAccounts(Auth::user()->currentCompany->id);
        return view('pos::pos.create', compact('accounts'));
    }



    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function editPhysical($id)
    {
        $pos = Pos::find($id);
        return view('pos::pos.edit', compact('pos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storePhysical(StorePosPhysicalRequest $request)
    {
        try {

            $this->posRepository->createPhysicalPos($request->validated(), Auth::user()->currentCompany->id);

            toast("Point de Vente créé avec succès!", 'success');

            return redirect()->route('app.pos.list');

        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function destroyPhysical(Pos $pos) {

        abort_if(Gate::denies('delete_pos'), 403);

        $pos->delete();

        toast('Votre point de vente a été détruit!', 'warning');

        return redirect()->route('app.pos.list');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StorePosSaleRequest $request)
    {
        try {

            $pos = $this->getCurrentPos();
            $pos_id = $pos['id'];

            $this->posRepository->createPos($request->validated(), $pos_id);

            // $this->accountRepository->addInAccountBook($request->validated(), $pos['account_id'], Auth::user()->currentCompany->id);

            toast('Commande encaissée avec succès!', 'success');

            return redirect()->route('app.pos.index');
            // return redirect()->route('sales.index');


        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function updatePhysical(UpdatePosPhysicalRequest $request, $id){

        try{
                $pos = Pos::findOrFail($id);
                $this->posRepository->editPos($request->validated(), $pos);
                toast(__('Votre Point de vente à été modifié avec succès'));

                return redirect()->route('app.pos.list');

        } catch(Exception $e) {
            return back()->withError($e->getMessage());
        }
    }


    public function startSession(StorePosSessionRequest $request){

        try {

            $this->posRepository->startNewSession($request->validated());

        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    // Customer

    public function customer(CustomersDataTable $dataTable) {
        // abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('pos::pos.customers.index');
    }



}
