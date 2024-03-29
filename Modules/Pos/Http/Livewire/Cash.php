<?php

namespace Modules\Pos\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Financial\Entities\Accounting\AccountBook;
use Modules\Pos\Entities\CashAction;
use Modules\Pos\Entities\CashPos;
use Modules\Pos\Entities\Pos;

class Cash extends Component
{
    public $physical;

    public $action = 'incoming';

    public $amount;

    public $note;

    public function mount()
    {
        $this->physical = $this->physical->id; //A modifier
    }

    protected $rules = [
        'action' => 'required',
        'amount' => 'required|numeric',
        'note' => 'required|max:255',
    ];


    public function proceed(Pos $physical)
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        // Save the cash operation to the database
            $cash = $physical->cash_pos;
            $current_cash = $cash->amount;

            // Update the pos cash amount
            $this->updateCash($cash, $current_cash);

            // store operation in database
            $this->addCashOperation($physical, $cash);

            // store operation in database
            $this->AddAccountOperation($physical, $this->amount, $this->note);

            $this->action == 'incoming' ? toast("L'entée de caisse a été enregistrée !", 'success') : toast("La sortie de caisse a été enregistrée !", 'success');

            redirect()->route('app.pos.index');

    }

    public function resetFields(){

        // Reset the form fields
        $this->action = null;
        $this->amount = null;
        $this->note = null;
    }
    public function updateCash($cash, $current_cash){

        $cash->amount = $this->action == 'incoming' ? $current_cash + $this->amount : $current_cash - $this->amount;
        $cash->save();

    }


    public function addCashOperation($physical, $cash){

        $cashAction = new CashAction();

        $cashAction->pos_session_id = $physical->id;
        $cashAction->cash_id = $cash->id;
        $cashAction->action = $this->action;
        $cashAction->amount = $this->action == 'incoming' ? $this->amount : -$this->amount;
        $cashAction->note = $this->note;
        $cashAction->save();
    }

    public function addAccountOperation($physical, $amount, $note){

        $current_balance = $physical->account->balance;

        $action = $this->action == 'incoming' ? 'debit' : 'credit';
        $detail = $this->action == 'incoming' ? 'Dépôt(Pdv: '.$physical->name.')' : 'Retrait(Pdv: '.$physical->name.')';

        $book = AccountBook::create([
            'company_id' => Auth::user()->currentCompany->id,
            'account_id' => $physical->account_id,
            'user_id' => Auth::user()->id,
            'detail' => $detail,
            'balance' => $amount,
            $action => $amount,
            'note'  => $note,
            'date' => now()->format('d-m-Y H:i:s'),
        ]);

        $book->save();

        $new_balance = $this->action == 'incoming' ? $current_balance + $book->balance : $current_balance - $book->balance;
        // $new_balance = $current_balance + $book->balance;

        $physical->account->balance = $new_balance;
        $physical->account->save();

        $book->balance = $new_balance;
        $book->save();
    }


    public function render()
    {
        return view('pos::livewire.cash');
    }
}
