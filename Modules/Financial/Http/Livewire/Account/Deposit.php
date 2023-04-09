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

    // public $detail;

    public $note;

    public $date;


    // public function mount()
    // {
    //     $this->date = $this->data->id; //A modifier
    // }

    protected $rules = [
        'amount' => 'required|numeric',
        // 'detail' => 'required|max:150',
        'note' => 'required|max:150',
        'date' => 'required',
    ];

    public function deposit(){

        $this->validate();

        // Valeur du solde actuel
        $current_balance = $this->data->balance;

        // Company
        $company = Auth::user()->currentCompany;
        // User
        $user = Auth::user();

        // $book = AccountBook::create([
        //     'company_id' => Auth::user()->currentCompany->id,
        //     'account_id' => $this->data->id,
        //     'user_id' => Auth::user()->id,
        //     'detail' => 'Dépôt(Par: )',
        //     'balance' => $this->amount,
        //     'debit' => $this->amount,
        //     'date' => $this->date,
        // ]);
        // $book->save();

        AccountBook::create([
            'company_id' => $company->id,
            'account_id' => $this->data->id,
            'user_id' => $user->id,
            'debit' => $this->amount,
            'balance' => $this->amount,
            'detail' => 'Dépôt',
            'note' => $this->note,
            'date' => $this->date,
        ]);

        $this->data->balance = $this->balance;
        $this->data->save();


        toast('Le dépôt a bien été effectué !', 'success');

        return redirect()->back();

    }


    public function render()
    {
        return view('financial::livewire.account.deposit');
    }
}
