<?php

namespace Modules\Financial\DataTables;

use Illuminate\Support\Facades\Auth;
use Modules\Expense\Entities\Expense;
use Modules\Financial\Entities\Accounting\Account;
use Modules\Financial\Entities\Accounting\AccountBook;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AccountBooksDataTable extends DataTable
{

    protected $account;

    public function __construct($account = null)
    {
        // dd($account);
        $this->account = $account;
    }

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('credit', function ($data) {
                return format_currency($data->credit);
            })
            ->addColumn('debit', function ($data) {
                return format_currency($data->debit);
            })
            ->addColumn('balance', function ($data) {
                return format_currency($data->balance);
            })
            ->addColumn('action', function ($data) {
                return view('financial::accounts.books.partials.actions', compact('data'));
            });
    }

    public function query(AccountBook $model) {
        // A modifier

        // $current_company_id = Auth::user()->currentCompany->id;
        return $model->where('account_id', $this->account->id)->orderBy('id', 'DESC')->newQuery()->with('user', 'account');// A modifier en fonction de la company en cours d'utilisation
    }

    public function html() {
        return $this->builder()
            ->setTableId('account_books-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                'tr' .
                                <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(4)
            ->buttons(
                Button::make('excel')
                ->text('<i class="bi bi-file-earmark-excel-fill"></i> Excel'),
                Button::make('print')
                ->text('<i class="bi bi-printer-fill"></i> '.__('Print')),
                Button::make('reset')
                ->text('<i class="bi bi-x-circle"></i> '.__('Reset')),
                Button::make('reload')
                ->text('<i class="bi bi-arrow-repeat"></i> '.__('Reload'))
            );
    }

    protected function getColumns() {
        return [
        Column::make('date')
            ->title(__('Date'))
            ->className('text-center align-middle'),

        Column::computed('detail')
            ->title('Description')
            ->className('text-center align-middle'),

        Column::make('note')
            ->title(__('Remarque'))
            ->className('text-center align-middle'),

        Column::make('user.name')
            ->title(__('Ajouté Par'))
            ->className('text-center align-middle'),

        Column::computed('credit')
            ->title(__('Crédit'))
            ->className('text-center align-middle'),

        Column::computed('debit')
            ->title(__('Débit'))
            ->className('text-center align-middle'),

        Column::computed('balance')
            ->title(__('Solde'))
            ->className('text-center align-middle'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->className('text-center align-middle'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename() {
        return 'Accounts' . date('YmdHis');
    }
}
