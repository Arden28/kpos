<?php

namespace Modules\Financial\DataTables;

use Illuminate\Support\Facades\Auth;
use Modules\Expense\Entities\Expense;
use Modules\Financial\Entities\Accounting\Account;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AccountsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('balance', function ($data) {
                return format_currency($data->balance);
            })
            ->addColumn('action', function ($data) {
                return view('financial::accounts.partials.actions', compact('data'));
            });
    }

    public function query(Account $model) {
        // A modifier
        $current_company_id = Auth::user()->currentCompany->id;
        return $model->orderBy('id', 'DESC')->where('company_id', $current_company_id)->with('user')->newQuery();
    }

    public function html() {
        return $this->builder()
            ->setTableId('accounts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                'tr' .
                                <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(6)
            ->buttons(
                Button::make('excel')
                    ->text('<i class="bi bi-file-earmark-excel-fill"></i> Excel'),
                Button::make('print')
                    ->text('<i class="bi bi-printer-fill"></i> Print'),
                Button::make('reset')
                    ->text('<i class="bi bi-x-circle"></i> Reset'),
                Button::make('reload')
                    ->text('<i class="bi bi-arrow-repeat"></i> Reload')
            );
    }

    protected function getColumns() {
        return [
            Column::make('account_name')
                ->title(__('Nom du Compte'))
                ->className('text-center align-middle'),

            Column::computed('number')
                ->title('Numéro de Compte')
                ->className('text-center align-middle'),

            Column::make('note')
                ->title(__('Remarque'))
                ->className('text-center align-middle'),

            Column::computed('balance')
                ->title(__('Solde'))
                ->className('text-center align-middle'),

            Column::computed('user.name')
                ->title(__('Ajouté Par'))
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
