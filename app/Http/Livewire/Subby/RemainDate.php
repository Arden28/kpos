<?php

namespace App\Http\Livewire\Subby;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RemainDate extends Component
{
    public $days;

    public function refreshComponent()
    {
        $this->emit('refreshComponent');
    }

    public function mount(){
        $date1 = Carbon::today();
        $date2 = Carbon::parse(subscribed(Auth::user()->team->id)->trial_ends_at);
        $days = $date2->diffInDays($date1);
        $this->days = $days;
    }
    public function render()
    {
        return view('livewire.subby.remain-date', [
            'days' => $this->days,
        ]);
    }
}
