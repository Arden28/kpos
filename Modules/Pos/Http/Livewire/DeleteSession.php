<?php

namespace Modules\Pos\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Modules\Pos\Entities\PhysicalPos;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;

class DeleteSession extends Component
{

    public $listeners = ['refreshShop'];

    public $pos;

    public $pos_session;

    public $account;

    public $sales;

    public $end_amount;

    // public $end_date;

    public $end_note;

    public $pos_id;

    public $physical;

    // The amount expected to be in cash
    public $expected_amount;

    // The real amount in the cash
    public $entered_amount;

    // the difference between the expected and the actual amount
    public $difference;


    public function mount($sales)
    {
        // $this->physical = Pos::find($this->pos->pos_id); //A modifier

        $this->expected_amount = $this->physical->cash_pos->amount; // remove the format_currency() function

        // $this->pos_id = $this->pos->pos_id;
        $this->pos_id = $this->physical->id;
        $this->pos_session = $this->pos->id; //A modifier
        $this->sales = $sales; //A modifier
    }

    // public function defaultValue($sales){
    //     format_currency($sales->sum(function($sales) {
    //         return $sales->sale->paid_amount;
    //     }) );
    // }
    public function exit(){
        redirect()->route('app.pos.dashboard');
    }

    public function delete(PhysicalPosSession $pos_session){

        $pos_session->end_amount = $this->entered_amount;
        $pos_session->expected_amount = $this->expected_amount;
        $pos_session->gap = $this->difference;
        $pos_session->end_date = Carbon::now()->format('d-m-Y H:i:s');
        $pos_session->end_note = $this->end_note;
        $pos_session->is_active = 0;
        $pos_session->save();

        // Update Pos
        $physical = Pos::where('id', $this->pos_id)->first();
        $physical->current_pos_session_id = 0;
        $physical->is_active = 0;
        $physical->save();

        // Update user current pos id
        $user = User::find(Auth::user()->id)->first();
        $user->current_pos_id = 0;
        $user->save();

        session()->forget('pos_session');
        session()->forget('pos_id');
        cache()->forget('pos');

        session()->flash('message', __('Vous avez cloturé cette session !'));
        redirect()->route('app.pos.dashboard');
    }

    public function calculateDifference()
    {
        $this->difference = floatval($this->expected_amount) - floatval($this->entered_amount);
    }

    public function updatedEnteredAmount()
    {
        $this->calculateDifference();
    }

    public function debounceEnteredAmount()
    {
        $this->debounce('updatedEnteredAmount', function () {
            $this->calculateDifference();
        }, 500);
    }


    public function render()
    {
        $pos = PhysicalPosSession::find($this->pos->id)->first();
        return view('pos::livewire.delete-session', [

            'pos' => $pos,
            'expected_amount_formatted' => format_currency($this->expected_amount), // add a formatted version of the $expected_amount property
        ]);
    }
}
