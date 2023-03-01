<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public $currentStep = 1;

    public function mount(){

    }

    public function nextStep()
    {
        $this->currentStep++;
    }
    public function previousStep()
    {
        $this->currentStep--;
    }

    public function selectSubscription()
    {
        //
    }

    public function selectPaymentMethod()
    {
        //
    }

    public function register(){

    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
