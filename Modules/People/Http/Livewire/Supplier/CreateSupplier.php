<?php

namespace Modules\People\Http\Livewire\Supplier;

use App\Traits\CompanySession;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\People\Entities\Supplier;

class CreateSupplier extends Component
{
    use CompanySession;
    public $supplier_name;

    public $supplier_email;

    public $supplier_phone;

    public $city;

    public $country;

    public $address;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
        'supplier_name' => 'required|max:100',
        // 'supplier_email' => 'required|email|unique:suppliers',
        // 'supplier_phone' => 'required|numeric|unique:suppliers',
        // 'city' => 'required',
        // 'country' => 'required',
        // 'address' => 'required|max:200',
    ];

    public function submitSupplier(){

        $this->validate();

        $supplier = Supplier::create([
            'company_id' => Auth::user()->currentCompany->id,

            'supplier_name' => $this->supplier_name,
            'supplier_email' => $this->supplier_email,
            'supplier_phone' => $this->supplier_phone,
            'city' => $this->city,
            'country' => $this->country,
            'address' => $this->address,
        ]);

        if($supplier->save()){
            // $this->emit('refreshComponent');
            session()->flash('message', 'Fournisseur ajouté !');
        }


    }
    public function render()
    {
        return view('people::livewire.supplier.create-supplier');
    }
}
