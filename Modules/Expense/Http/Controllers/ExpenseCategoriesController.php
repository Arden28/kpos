<?php

namespace Modules\Expense\Http\Controllers;

use Modules\Expense\DataTables\ExpenseCategoriesDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Expense\Entities\ExpenseCategory;
use Modules\Financial\Interfaces\Accounting\AccountInterface;

class ExpenseCategoriesController extends Controller
{

    protected $accountRepository;

    public function __construct(AccountInterface $accountRepository){
        $this->accountRepository = $accountRepository;
    }


    public function index(ExpenseCategoriesDataTable $dataTable) {
        abort_if(Gate::denies('access_expense_categories'), 403);

        $accounts = $this->accountRepository->getCompanyAccounts(Auth::user()->currentCompany->id);

        return $dataTable->render('expense::categories.index', compact('accounts'));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('access_expense_categories'), 403);

        $request->validate([
            'category_name' => 'required|string|max:255|unique:expense_categories,category_name',
            'category_description' => 'nullable|string|max:1000',
            'account_id' => 'required|integer',
        ]);

        ExpenseCategory::create([
            'company_id' => Auth::user()->currentCompany->id,

            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'account_id' => $request->account_id
        ]);

        toast('La Catégorie de Dépense a été créée !', 'success');

        return redirect()->route('expense-categories.index');
    }


    public function edit(ExpenseCategory $expenseCategory) {
        abort_if(Gate::denies('access_expense_categories'), 403);

        return view('expense::categories.edit', compact('expenseCategory'));
    }


    public function update(Request $request, ExpenseCategory $expenseCategory) {
        abort_if(Gate::denies('access_expense_categories'), 403);

        $request->validate([
            'category_name' => 'required|string|max:255|unique:expense_categories,category_name,' . $expenseCategory->id,
            'category_description' => 'nullable|string|max:1000'
        ]);

        $expenseCategory->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description
        ]);

        toast('La Catégorie de Dépense a été Mis à jours !', 'info');

        return redirect()->route('expense-categories.index');
    }


    public function destroy(ExpenseCategory $expenseCategory) {
        abort_if(Gate::denies('access_expense_categories'), 403);

        // if ($expenseCategory->expenses()->isNotEmpty()) {
        if ($expenseCategory->expenses()->count() > 0) {
            return back()->withErrors('Can\'t delete beacuse there are expenses associated with this category.');
        }

        $expenseCategory->delete();

        toast('La Catégorie de Dépense a été supprimée!', 'warning');

        return redirect()->route('expense-categories.index');
    }
}
