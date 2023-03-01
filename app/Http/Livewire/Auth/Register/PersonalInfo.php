<?php

namespace App\Http\Livewire\Auth\Register;

use Livewire\Component;

class PersonalInfo extends Component
{
    public $current = 1;

    public function submitPersonal(){
        $this->current = 2;
    }
    public function render()
    {
        return view('livewire.auth.register.personal-info');
    }
}
