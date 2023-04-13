<?php

namespace Modules\Financial\Http\Controllers\Accounting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Financial\DataTables\AccountBooksDataTable;
use Modules\Financial\DataTables\FluxDataTable;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Financial\Entities\Accounting\AccountBook;
use Modules\Financial\Http\Requests\Account\AccountBookRequest;

class AccountBookController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Account $account, FluxDataTable $dataTable)
    {

        // return view('financial::accounts.books.index', compact('account'));
        return $dataTable->render('financial::accounts.flux', compact('account'));
    }

    public function deposit(AccountBookRequest $request, $id){

        $request->validated();

        $account = Account::find($id)->first();

        $user = Auth::user()->id;
        $company = Auth::user()->currentCompany->id;

        $current_balance = $account->balance;

        $book = AccountBook::create([
            'company_id' => $company,
            'account_id' => $account->id,
            'user_id' => $user,
            'detail' => 'Dépôt.',
            'balance' => $account->balance,
            'debit' => $request->amount,
            'date' => now()->format('d-m-Y H:i:s'),
            'note' => $request->note,

        ]);
        $book->save();

        $new_balance = $current_balance + $request->amount;

        $account->balance = $new_balance;
        $account->save();

        $book->balance = $new_balance;
        $book->save();

        toast('Le dépôt a été effectué !', 'success');

        return redirect()->back();
    }

    public function withdrawal(AccountBookRequest $request, $id){

        $request->validated();

        $account = Account::find($id)->first();

        $user = Auth::user()->id;
        $company = Auth::user()->currentCompany->id;

        $current_balance = $account->balance;

        $book = AccountBook::create([
            'company_id' => $company,
            'account_id' => $account->id,
            'user_id' => $user,
            'detail' => 'Retrait.',
            'balance' => $account->balance,
            'credit' => $request->amount,
            // 'date' => $request->date,
            'date' => now()->format('d-m-Y H:i:s'),
            'note' => $request->note,

        ]);

        $book->save();

        $new_balance = $current_balance - $request->amount;

        $account->balance = $new_balance;
        $account->save();

        $book->balance = $new_balance;
        $book->save();

        toast('Le retrait a été effectué !', 'success');

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $category = AccountBook::findOrFail($id);

        $category->delete();

        toast('La transaction a bien été supprimée !', 'warning');

        return redirect()->route('account.index');
    }
}
