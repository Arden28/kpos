<?php

namespace Modules\Pos\Traits;

use App\Abstracts\Membership;
use Modules\Pos\Entities\Pos;
use App\Models\User;
use Modules\Pos\Entities\CashAction;

trait HasCash{

    public function updateCash($cash, $current_cash, $amount, $action)
    {
        $cash->amount = $action == 'incoming' ? $current_cash + $amount : $current_cash - $amount;
        $cash->save();
    }

    public function addCashOperation($physical, $cash, $amount, $action, $note)
    {
        $cashAction = new CashAction();

        $cashAction->pos_session_id = $physical->id;
        $cashAction->cash_id = $cash->id;
        $cashAction->action = $action;
        $cashAction->amount = $action == 'incoming' ? $amount : -$amount;
        $cashAction->note = $note;
        $cashAction->save();
    }

}
