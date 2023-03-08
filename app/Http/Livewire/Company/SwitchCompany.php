<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use App\Models\User;
use Livewire\Component;
use Modules\Setting\Entities\Setting;

class SwitchCompany extends Component
{

    public $show = false;
    public $user;

    public $company;

    public function mount(User $user, Company $company)
    {
        $this->user = $user;
        $this->company = $company->id;

    }

    public function showModal()
    {
        $this->show = true;
    }
    public function hideModal()
    {
        $this->show = false;
    }

    public function disconnectFromCompany(){

        cache()->forget('settings');
        session()->forget('browse_company_id');
    }

    public function connect($company){

        session(['browse_company_id' => $company]);
    }

    public function getCompany($company){
        $current_company= Setting::find($company)->first();
        return $current_company->company_name;
    }

    public function switchToCompany()
    {
        $company = $this->company;

        $this->disconnectFromCompany();
        // Connect the user to the selected company
        $this->user->current_company_id = $company;
        $this->user->save();

        $this->connect($company);


        toast(__('Vous avez changé de compte !'), 'success');
        // Redirect to the dashboard or another page
        return redirect()->route('dashboard');

    }

    public function render()
    {
        $company_info = Setting::find($this->company)->first();
        return view('livewire.company.switch-company', compact('company_info'));
    }
}
