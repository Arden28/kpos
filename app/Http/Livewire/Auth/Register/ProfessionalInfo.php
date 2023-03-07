<?php

namespace App\Http\Livewire\Auth\Register;

use Livewire\Component;

class ProfessionalInfo extends Component
{
    public $company_name;

    public $type;
    public $company_size;
    public $primary_interest;

    protected $rules = [
        'company_name' => 'required|string|max:255|unique:settings',
        'type' => 'required|string|max:255',
        'company_size' => 'required|string|max:255',
        'primary_interest' => 'required|string|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function nextStep()
    {
        $this->validate();

        $this->emitUp('stepCompleted', 2);
    }

    public function previousStep()
    {
        $this->emitUp('showStep', 1);
    }
    public function render()
    {
        return view('livewire.auth.register.professional-info');
    }
}
