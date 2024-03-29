<?php

namespace Modules\Financial\Http\Livewire\Account;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Financial\Entities\Accounting\AccountBook;

class Deposit extends Component
{

    public $data;

    public $amount;

    public $date;
    public $note;

    protected $rules = [
        'amount' => 'required|min:6',
        'date' => 'required',
        'note' => 'max:150',
    ];

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        $book = AccountBook::create([
            'company_id' => Auth::user()->currentCompany->id,
            'account_id' => $this->data->account_id,
            'user_id' => Auth::user()->id,
            'detail' => 'Dépôt',
            'balance' => $this->amount,
            'debit' => $this->amount,
            'amount' => $this->amount,
            'date' => $this->date,
            'note' => $this->note,
        ]);
        $book->save();
    }


    public function render()
    {
        return view('financial::livewire.account.deposit');
    }
}
