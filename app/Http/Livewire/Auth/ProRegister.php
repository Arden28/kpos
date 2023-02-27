<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Subby\Interfaces\PlanInterface;

class ProRegister extends Component
{
    public $currentStep = 1;

    // public $subscription;
    public $selectedPlanId;

    public $selectedPaymentMethod;

    public $paymentMethod;


    public $plan;

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

    public function selectSubscription($selectedPlanId)
    {
        $this->selectedPlanId = $selectedPlanId;
    }

    public function selectPaymentMethod($selectedPaymentMethod)
    {
        $this->selectedPaymentMethod = $selectedPaymentMethod;
    }

    public function subscribe()
    {
        $user = User::findOrFail(Auth::user()->id);
        $selectedPlan = Plan::findOrFail($this->selectedPlanId);

        $user->newSubscription(
            'main', // identifier tag of the subscription. If your application offers a single subscription, you might call this 'main' or 'primary'
            $selectedPlan, // Plan or PlanCombination instance your subscriber is subscribing to
            $selectedPlan->name, // Human-readable name for your subscription
            $selectedPlan->description, // Description
            null, // Start date for the subscription, defaults to now()
            'free' // Payment method service defined in config
        );

        // $user->newSubscription('main', $selectedPlan, 'Main subscription', 'Customer main subscription');

        redirect()->route('dashboard');
    }

    public function render()
    {
        $plans = Plan::all();
        return view('livewire.auth.pro-register',
            [
                'plans' => $plans,
            ]
        );
    }
}
