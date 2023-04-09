<?php

namespace Modules\Financial\Repositories\Accounting;

use Modules\Financial\Interfaces\Accounting\AccountInterface;
use Modules\Financial\Entities\Accounting\Account;
use Illuminate\Support\Facades\Auth;
use Modules\Financial\Entities\Accounting\AccountBook;

class AccountRepository implements AccountInterface
{

    public function getCompanyAccounts($company){
        return Account::where('company_id', $company)->get();
    }

    public function createAccount($request, $company){

        // $code = Uuid::uuid4();
        $user = Auth::user()->id;

        $account = Account::create([
            'account_name' => $request['account_name'],
            'number' => $request['number'],
            'type_id' => $request['type_id'],
            'balance' => $request['balance'],
            'details' => $request['details'],
            'user_id' => $user,
            'company_id' => $company,
        ]);
        $account->save();

    }

    public function addInAccountBook($request, $account_id, $company){

        // $code = Uuid::uuid4();
        $user = Auth::user()->id;

        // $accountBook = AccountBook::create([
        //     'company_id' => $company,
        //     'account_id' => $account,
        //     'user_id' => $user,
        //     'detail' => 'vente(Pdv)',
        //     'balance' => $request->paid_amount,
        //     'debit' => $request->paid_amount,
        //     'date' => now()->format('d-m-Y H:i:s'),
        // ]);
        // $accountBook->save();

        $book = AccountBook::create([
            'company_id' => $company,
            'account_id' => $account_id,
            'user_id' => $user,
            'detail' => 'vente(Pdv)',
            'balance' => $request->paid_amount,
            'debit' => $request->paid_amount,
            'date' => now()->format('d-m-Y H:i:s'),
        ]);
        $book->save();

    }

}
