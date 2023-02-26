<?php

namespace App\Http\Livewire\Company;

use App\Models\User;
use Livewire\Component;

class ConnectToCompany extends Component
{
    public $step = 1;
    public $user;
    public $companies;

    public function mount(User $user)
    {
        $this->user = $user;

        if (!$user->hasMultipleCompanies()) {
            // Automatically connect the user to their only company
            $this->connectToCompany($user->companies()->first()->id);
        } else {
            // Display the company selection step
            $this->companies = $user->companies;
        }
    }

    public function connectToCompany($companyId)
    {
        // Connect the user to the selected company
        $this->user->current_company_id = $companyId;
        $this->user->save();

        // Redirect to the dashboard or another page
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.connect-to-company');
    }
}
