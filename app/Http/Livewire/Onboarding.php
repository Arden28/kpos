<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Onboarding extends Component
{
    public $step = 1;

    public $steps = [
        'Step 1 content goes here',
        'Step 2 content goes here',
        'Step 3 content goes here',
        'Step 4 content goes here',
        'Step 5 content goes here',
        'Step 6 content goes here',
        'Step 7 content goes here',
        'Step 8 content goes here',
    ];

    public $modalClasses = [
        'modal-step-1',
        'modal-step-2',
        'modal-step-3',
        'modal-step-4',
        'modal-step-5',
        'modal-step-6',
        'modal-step-7',
        'modal-step-8',
    ];

    public function nextStep()
    {
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.onboarding');
    }
}
