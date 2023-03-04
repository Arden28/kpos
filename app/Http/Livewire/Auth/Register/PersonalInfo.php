<?php

namespace App\Http\Livewire\Auth\Register;

use Livewire\Component;

class PersonalInfo extends Component
{
    public $name;
    public $email;

    public $phone;


    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
    ];

    public function render()
    {
        return view('livewire.auth.register.personal-info');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep()
    {
        $this->validate();

        $this->emitUp('stepCompleted', 1);
    }
}
