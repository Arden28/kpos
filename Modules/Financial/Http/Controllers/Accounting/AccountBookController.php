<?php

namespace Modules\Financial\Http\Controllers\Accounting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Financial\DataTables\AccountBooksDataTable;
use Modules\Financial\DataTables\FluxDataTable;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Financial\Entities\Accounting\AccountBook;

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

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('financial::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('financial::show');
    }

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

        $category = AccountBook::findOrFail($id);

        $category->delete();

        toast('La transaction a bien été supprimée !', 'warning');

        return redirect()->route('account.index');
    }
}
