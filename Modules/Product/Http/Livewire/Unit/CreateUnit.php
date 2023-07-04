<?php

namespace Modules\Product\Http\Livewire\Unit;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Product\Entities\Unit;

class CreateUnit extends Component
{
    public $msg;
    public $unit = 'unité';

    public $is_multiple = false;

    public $unit_name, $unit_short_name, $is_decimal, $parent_unit_id, $value;
    public function updatedUnitName()
    {
        $this->unit = $this->unit_name;
    }

    // public function isMultiple($status){
    //     $this->is_multiple = $status;
    // }

    protected $rules = [
        'unit_name' => 'required',
        'unit_short_name' => 'required',
        'is_decimal' => 'required|boolean',
        'is_multiple' => 'nullable|boolean',
        'parent_unit_id' => 'nullable',
        'value' => 'nullable|numeric'
    ];

    public function submit(){

        $this->validate();

        Unit::create([
            'unit_name' => $this->unit_name,
            'unit_short_name' => $this->unit_short_name,
            'is_decimal' => $this->is_decimal,
            'is_multiple' => $this->is_multiple,
            'parent_unit_id' => $this->parent_unit_id,
            'value' => $this->value,
            'company_id' => Auth::user()->currentCompany->id,
        ]);

        $this->reset();

        $this->msg = "L'unité de produit a été ajoutée!";

        toast("L'unité de produit a été ajoutée!", 'success');

        return redirect()->back();
    }

    public function render()
    {
        $units = Unit::all();
        return view('product::livewire.unit.create-unit', compact('units'));
    }
}
