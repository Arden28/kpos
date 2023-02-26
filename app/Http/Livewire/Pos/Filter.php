<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

class Filter extends Component
{
    public $categories;
    public $category;
    public $showCount;

    public function mount($categories) {

        //Ne récupère que les catégories enregistrées par la companie. A modifier
        $this->categories = $categories->where('company_id', session('browse_company_id'));
    }

    public function render() {
        return view('livewire.pos.filter');
    }

    public function updatedCategory() {
        $this->emitUp('selectedCategory', $this->category);
    }

    public function updatedShowCount() {
        $this->emitUp('showCount', $this->category);
    }
}
