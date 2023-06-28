<?php

namespace Modules\Pos\Http\Livewire\Session;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Join extends Component
{
    public $session;

    public $pos_id;

    public $pos_session_id;

    public function mount()
    {
        // $this->account_id = Account::find($this->account)->first();

        $this->pos_session_id = $this->session->id; //A modifier
        $this->pos_id = $this->session->pos->id;
    }

    public function join(){

        if(!session()->has('pos_session')){

            // Update user current pos id
            $user = User::find(Auth::user()->id)->find();
            $user->current_pos_id = $this->session->pos_id;
            $user->save();

            session(['pos_session' => true]);
            session(['pos_session_id' => $this->pos_session_id]);
            session(['pos_id' => $this->pos_id]);

            redirect()->route('app.pos.index');

        }else{

            session()->flash('message', __('Vous avez une session en cours. Veuillez d\'abord la clôturer avant de rejoindre celle-ci !'));
            redirect()->route('app.pos.dashboard');
        }
    }

    public function render()
    {
        return view('pos::livewire.session.join');
    }
}
