<?php

namespace Modules\Pos\Http\Livewire\Widget;

use Livewire\Component;

class TopWidget extends Component
{
    public function refreshPage()
    {
        $this->emit('refreshPage');
    }

    public function openNewWindow()
    {
        $this->emit('openNewWindow');
    }

    public function render()
    {
        return view('pos::livewire.widget.top-widget');
    }
}
