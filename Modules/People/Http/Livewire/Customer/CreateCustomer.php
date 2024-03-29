<?php

namespace Modules\People\Http\Livewire\Customer;

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
        'customer_email' => 'nullable|email|unique:customers',
        'customer_phone' => 'nullable|numeric|unique:customers',
        'city' => 'nullable',
        'country' => 'nullable',
        'address' => 'nullable|max:200',
    ];

    public function submit(){

        $this->validate();

        $customer = Customer::create([
            'company_id' => Auth::user()->currentCompany->id,

            'customer_name'  => $this->customer_name,
            'customer_phone' => empty($this->customer_phone) ? '+242064074926' : $this->customer_phone,
            'customer_email' => empty($this->customer_email) ? 'client@koverae.com' : $this->customer_email,
            'city'           => empty($this->city) ? 'Brazzaville' : $this->city,
            'country'        => empty($this->country) ? 'République du Congo' : $this->country,
            'address'        => empty($this->address) ? 'Ave de france' : $this->address
        ]);

        if($customer->save()){

            // Emit the 'customerCreated' event to update the customer list
            $this->emit('customerCreated');

            // Clear the form fields
            $this->customer_name = '';
            $this->customer_email = '';
            $this->customer_phone = '';
            $this->city = '';
            $this->country = '';
            $this->address = '';

            // Close the modal by triggering a Livewire action
            $this->dispatchBrowserEvent('closeCustomerModal');

            // session()->flash('message', 'Client ajouté !');
            // toast('Client ajouté !', 'success');
        }


    }
    public function render()
    {
        return view('people::livewire.customer.create-customer');
    }
}
