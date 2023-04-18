<?php

namespace Modules\Product\Http\Livewire\Category;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Product\Entities\Category;

class CreateCategory extends Component
{
    public $category_code;

    public $category_name;

    protected $rules = [
        'category_code' => 'required',
        'category_name' => 'required|max:20',
    ];

    public function submitCategory(){

        $this->validate();

        $category = Category::create([
            'company_id' => Auth::user()->currentCompany->id,

            'category_code' => $this->category_code,
            'category_name' => $this->category_name,
        ]);

        if($category->save()){
            // $this->emit('refreshComponent');
            session()->flash('message', 'Catégorie Ajoutée !');
        }


    }

    public function render()
    {
        return view('product::livewire.category.create-category');
    }
}
