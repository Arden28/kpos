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

    public $sales;

    public $end_amount;

    // public $end_date;

    public $end_note;

    public $pos_id;

    public function mount($sales)
    {
        $this->pos_id = $this->pos->pos_id;
        $this->pos = $this->pos->id; //A modifier
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

    public function delete(PhysicalPosSession $pos){

        $pos->end_amount = $this->end_amount;
        $pos->end_date = Carbon::now();
        $pos->is_active = 0;
        $pos->save();

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


    public function render()
    {
        $pos = PhysicalPosSession::find($this->pos)->first();
        return view('pos::livewire.delete-session', [
            'pos' => $pos,
    ]);
    }
}
