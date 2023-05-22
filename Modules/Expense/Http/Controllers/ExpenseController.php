<?php

namespace Modules\Expense\Http\Controllers;

use Modules\Expense\DataTables\ExpensesDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Modules\Expense\Entities\Expense;
use Modules\Expense\Entities\ExpenseCategory;
use Modules\Financial\Entities\Accounting\AccountBook;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class ExpenseController extends Controller
{

    public function index(ExpensesDataTable $dataTable) {
        abort_if(Gate::denies('access_expenses'), 403);

        return $dataTable->render('expense::expenses.index');
    }


    public function create() {
        abort_if(Gate::denies('create_expenses'), 403);
        $categories = ExpenseCategory::where('company_id', Auth::user()->currentCompany->id)->get();
        return view('expense::expenses.create', compact('categories'));
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_expenses'), 403);

        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string|max:255',
            'category_id' => 'required',
            'amount' => 'required|numeric|max:2147483647',
            'details' => 'nullable|string|max:1000'
        ]);

        $category = ExpenseCategory::find($request->category_id)->first();

        $expense = Expense::create([
            'company_id' => Auth::user()->currentCompany->id,
            'account_id' => $category->account->id,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'details' => $request->details
        ]);

        // Register to the book.

        $current_balance = $expense->account->balance;

        $book = AccountBook::create([
            'company_id' => Auth::user()->currentCompany->id,
            'account_id' => $category->account->id,
            'user_id' => Auth::user()->id,
            'detail' => 'Dépense(Pour : '.$category->category_name.')',
            'note' => $request->details,
            'balance' => $request->amount,
            'credit' => $request->amount,
            'date' => now()->format('d-m-Y H:i:s'),
        ]);

        $book->save();

        $new_balance = $current_balance - $book->balance;

        $expense->account->balance = $new_balance;
        $expense->account->save();

        $book->balance = $new_balance;
        $book->save();

        toast('Votre Dépense a bien été ajoutée!', 'success');

        return redirect()->route('expenses.index');
    }


    public function edit(Expense $expense) {
        abort_if(Gate::denies('edit_expenses'), 403);

        return view('expense::expenses.edit', compact('expense'));
    }


    public function update(Request $request, Expense $expense) {
        abort_if(Gate::denies('edit_expenses'), 403);

        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string|max:255',
            'category_id' => 'required',
            'amount' => 'required|numeric|max:2147483647',
            'details' => 'nullable|string|max:1000'
        ]);

        $expense->update([
            'date' => $request->date,
            'reference' => $request->reference,
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'details' => $request->details
        ]);

        toast('Votre Dépense a bien été mise à jours!', 'info');

        return redirect()->route('expenses.index');
    }


    public function destroy(Expense $expense) {
        abort_if(Gate::denies('delete_expenses'), 403);

        $expense->delete();

        toast('Votre Dépense a bien été supprimée !', 'warning');

        return redirect()->route('expenses.index');
    }
}
