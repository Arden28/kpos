<?php

namespace Modules\Pos\Http\Livewire;

use App\Interfaces\CompanyInterface;
use App\Traits\CompanySession;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Modules\Pos\Entities\CashPos;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;

class CreateSession extends Component
{
    use CompanySession;
    public $p;
    public $pos_id;
    public $user_id;
    public $start_date;
    public $start_amount;
    public $note;

    public $session;

    protected $stop_id;

    public function mount()
    {
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
                $pos_session = PhysicalPosSession::create([
                    // 'start_date' => $this->start_date,
                    'start_date' => Carbon::now(),
                    'start_amount' => $this->start_amount,
                    'note' => $this->note,
                    'pos_id' => $this->pos_id,
                    'user_id' => $this->user_id,
                    'company_id' => Auth::user()->currentCompany->id,
                    'is_active' => 1,
                ]);

                    if($pos_session->save()){

                        // Upadate Cash
                        $cash = CashPos::where('pos_id', $pos_session->pos_id)->first();
                        $cash->amount = $pos_session->start_amount;
                        $cash->save();

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

    public function stopSession($stop_id){

    }

    public function render()
    {
        return view('pos::livewire.create-session');
    }
}
