<?php

namespace Modules\Pos\Http\Livewire;

use App\Interfaces\CompanyInterface;
use App\Models\User;
use App\Traits\CompanySession;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Pos\Entities\CashPos;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;
use Modules\Product\Entities\Product;

class CreateSession extends Component
{
    use CompanySession;
    public $p;

    public $account;

    public $pos_id;
    public $user_id;
    public $start_date;
    public $start_amount;
    public $note;

    public $session;

    protected $stop_id;

    public $products = [];

    public $totalStockValue = 0;

    public function mount()
    {
        // $this->account_id = Account::find($this->account)->first();

        $this->start_amount = $this->account->balance;
        $this->pos_id = $this->p->id; //A modifier
        $this->user_id = auth()->user()->id;

    }


    protected $rules = [
        'pos_id' => 'required',
        'user_id' => 'required',
        // 'start_date' => 'required',
        'start_amount' => 'required',
        'note' => 'max:200',
    ];

    public function submit()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.

        // Si il y'a déjà une session en cours, vous êtes redirigé et une erreur est envoyée
        if(!session()->has('pos_session')){

                // Got stock value
                $saleValue = $this->calculateTotal('price');
                $purchaseValue = $this->calculateTotal('cost');
                // dd($saleValue, $purchaseValue);

                $pos_session = PhysicalPosSession::create([
                    // 'start_date' => $this->start_date,
                    'start_date' => Carbon::now()->format('d-m-Y H:i:s'),
                    'start_amount' => $this->start_amount,
                    'note' => $this->note,
                    'pos_id' => $this->pos_id,
                    'user_id' => $this->user_id,
                    'company_id' => Auth::user()->currentCompany->id,
                    'start_stock_price_value' => $saleValue,
                    'start_stock_cost_value' => $purchaseValue,
                    'is_active' => 1,
                ]);

                    if($pos_session->save()){

                        // Update Cash
                        $cash = CashPos::where('pos_id', $pos_session->pos_id)->first();
                        $cash->amount = $pos_session->start_amount;
                        $cash->save();

                        // Update Pos
                        $physical = Pos::where('id', $this->pos_id)->first();
                        // $physical = Pos::with('account')->where('id', $this->pos_id)->first();
                        $physical->current_pos_session_id = $pos_session->id;
                        $physical->is_active = 1;
                        $physical->save();

                        // Update user current pos id
                        $user = User::find(Auth::user()->id);
                        // $user->current_pos_id = $physical->id;
                        $user->current_pos_id = $pos_session->pos_id;
                        $user->save();

                        session(['pos_session' => true]);
                        session(['pos_session_id' => $pos_session->id]);
                        session(['pos_id' => $this->pos_id]);


                        return redirect()->route('app.pos.index');

                    }else{
                        session()->flash('message', __('Une erreur est survenue. Veuillez rééssayer plutard.'));
                        redirect()->route('app.pos.dashboard');
                    }


        }else{

            session()->flash('message', __('Vous avez une session en cours. Veuillez d\'abord la clôturer !'));
            redirect()->route('app.pos.dashboard');

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


    public function stopSession($stop_id){

    }

    public function render()
    {
        return view('pos::livewire.create-session');
    }
}
