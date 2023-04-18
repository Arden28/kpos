<?php

namespace Modules\Pos\Http\Livewire\Session;

use Livewire\Component;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;

class KeepOn extends Component
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

    public function keep(){

        if(!session()->has('pos_session')){

            session(['pos_session' => true]);
            session(['pos_session_id' => $this->pos_session_id]);
            session(['pos_id' => $this->pos_id]);

            redirect()->route('app.pos.index');

        }else{

            redirect()->route('app.pos.index');
        }
    }


    public function render()
    {
        return view('pos::livewire.session.keep-on');
    }
}
