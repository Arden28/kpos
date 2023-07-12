<?php

namespace App\Http\Livewire\Customer;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\People\Entities\Customer;

class CreateCustomer extends Component
{
    public $customer_name;
    public $customer_email;
    public $customer_phone;
    public $city;
    public $country;
    public $address;

    public function createCustomer()
    {
        // Validate the form data
        $this->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'address' => 'required',
        ]);

        // Save the customer to the database
        Customer::create([
            'company_id'     => Auth::user()->currentCompany->id,
            'customer_name'  => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_email' => $this->customer_email,
            'city'           => $this->city,
            'country'        => $this->country,
            'address'        => $this->address
        ]);

        // Show a success message
        // session()->flash('message', 'Customer created successfully.');

        toast('Customer Created!', 'success');

        // Clear the form fields
        $this->customer_name = '';
        $this->customer_email = '';
        $this->customer_phone = '';
        $this->city = '';
        $this->country = '';
        $this->address = '';

    }
    public function render()
    {
        return view('livewire.customer.create-customer');
    }
}
