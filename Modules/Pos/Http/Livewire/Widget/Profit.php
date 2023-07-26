<?php

namespace Modules\Pos\Http\Livewire\Widget;

use Livewire\Component;

class Profit extends Component
{

    public $sales;

    public function render()
    {
        return view('pos::livewire.widget.profit');
    }
}
