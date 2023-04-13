<?php

namespace Modules\Subby\Http\Livewire;

use Livewire\Component;

class Plan extends Component
{
    public function render()
    {
        return view('subby::livewire.plan');
    }

    public function start(){

        redirect()->route('register.pro');
    }
}
