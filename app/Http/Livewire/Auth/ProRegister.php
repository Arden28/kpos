<?php

namespace App\Http\Livewire\Auth;

use App\Models\Team;
// use App\Models\team;
use Bpuig\Subby\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Subby\Interfaces\PlanInterface;
use Bmatovu\MtnMomo\Products\Collection;
use Bmatovu\MtnMomo\Exceptions\CollectionRequestException;


class ProRegister extends Component
{
    public $currentStep = 1;

    public $billingCycle = 'monthly';

    public $billingCycles = [
        'monthly' => 'Par Mois',
        'annual' => 'Par An',
    ];

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
        $team = Team::findOrFail(Auth::user()->team->id);
        $selectedPlan = Plan::findOrFail($this->selectedPlanId);
        $selectedPaymentMethod = $this->selectedPaymentMethod;

        $team->newSubscription(
            'main', // identifier tag of the subscription. If your application offers a single subscription, you might call this 'main' or 'primary'
            $selectedPlan, // Plan or PlanCombination instance your subscriber is subscribing to
            $selectedPlan->name, // Human-readable name for your subscription
            $selectedPlan->description, // Description
            null, // Start date for the subscription, defaults to now()
            // 'free' // Payment method service defined in config
        );

        // $team->newSubscription('main', $selectedPlan, 'Main subscription', 'Customer main subscription');

        redirect()->route('dashboard');
    }

    public function proceedPayment(){

    }

    public function render()
    {
        if($this->billingCycle === 'monthly')
            $plans = Plan::where('invoice_interval', 'month')->get();

        elseif($this->billingCycle === 'annual'){
            $plans = Plan::where('invoice_interval', 'year')->get();

        }

        return view('livewire.auth.pro-register',
            [
                'plans' => $plans,
            ]
        );
    }
}
