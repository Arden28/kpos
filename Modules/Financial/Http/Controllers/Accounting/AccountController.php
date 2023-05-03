<?php

namespace Modules\Financial\Http\Controllers\Accounting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Gate;
use Modules\Financial\DataTables\AccountBooksDataTable;
use Modules\Financial\DataTables\AccountsDataTable;
use Modules\Financial\DataTables\FluxDataTable;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Financial\Entities\Accounting\AccountBook;
use Modules\Financial\Interfaces\Accounting\AccountInterface;
use Modules\Financial\Http\Requests\Accounting\AccountStoreRequest;

class AccountController extends Controller
{

    protected $accountRepository;

    public function __construct(AccountInterface $accountRepository){

        $this->accountRepository = $accountRepository;

        // abort_if(Gate::denies('access_account_management'), 403);

    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(AccountsDataTable $dataTable) {

        abort_if(Gate::denies('access_account_management'), 403);

        return $dataTable->render('financial::accounts.index');
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AccountStoreRequest $request)
    {
        abort_if(Gate::denies('create_account'), 403);

        $request->validated();

        $user = Auth::user()->id;
        $company = Auth::user()->currentCompany->id;

        $account = Account::create([
            'account_name' => $request->account_name,
            'number' => $request->number,
            'type_id' => $request->type_id,
            'balance' => $request->balance,
            'details' => $request->details,
            'note' => $request->note,
            'user_id' => $user,
            'company_id' => $company,
        ]);

        $account_id = $account->id;

        $book = AccountBook::create([
            'company_id' => $company,
            'account_id' => $account_id,
            'user_id' => $user,
            'detail' => 'solde d\'ouverture.',
            'balance' => $request->balance,
            'debit' => $request->balance,
            'date' => now()->format('d-m-Y H:i:s'),
        ]);
        $book->save();

        $account->save();

        toast('Le compte a bien été créé !', 'success');

        return redirect()->back();
    }

    /**
     */
    public function show(AccountBooksDataTable $dataTable, Account $account)
    {
        abort_if(Gate::denies('access_account_book'), 403);

        // return view('financial::accounts.books.index', compact('account'));

        $dataTable = new AccountBooksDataTable($account);
        return $dataTable->render('financial::accounts.books.index', [
            'account' => $account,
        ]);
        // return $dataTable->render('financial::accounts.books.index', compact('account'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    // public function allBooks(FluxDataTable $dataTable)
    // {

    //     // return view('financial::accounts.books.index', compact('account'));
    //     return $dataTable->render('financial::accounts.flux');
    // }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('financial::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $category = Account::findOrFail($id);

        $category->delete();

        toast('Le compte a bien été supprimé !', 'warning');

        return redirect()->route('account.index');
    }

}
