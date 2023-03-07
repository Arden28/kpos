<?php

namespace Modules\People\Http\Livewire;

use App\Traits\CompanySession;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\People\Entities\Customer;

class CreateCustomer extends Component
{
    use CompanySession;
    public $customer_name;

    public $customer_email;

    public $customer_phone;

    public $city;

    public $country;

    public $address;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
        'customer_name' => 'required|max:100',
        'customer_email' => 'required|email|unique:customers',
        'customer_phone' => 'required|numeric|unique:customers',
        'city' => 'required',
        'country' => 'required',
        'address' => 'required|max:200',
    ];

    public function submit(){

        $this->validate();

        $customer = Customer::create([
            'company_id' => Auth::user()->currentCompany->id,

            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'customer_phone' => $this->customer_phone,
            'city' => $this->city,
            'country' => $this->country,
            'address' => $this->address,
        ]);

        if($customer->save()){
            // $this->emit('refreshComponent');
            session()->flash('message', 'Client ajouté !');
        }


    }
    public function render()
    {
        return view('people::livewire.customer.create-customer');
    }
}
