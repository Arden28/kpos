<?php

namespace Modules\Purchase\Http\Livewire\Status;

use Livewire\Component;

class Completed extends Component
{
    public $data;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function updateStatus($status){
        $this->data->status = $status;
        $this->data->save();
        $this->emit('refreshComponent');
    }

    public function submit(){

    }

    public function render()
    {
        return view('purchase::livewire.status.completed');
    }
}
