<?php

namespace Modules\Quotation\DataTables;

use Illuminate\Support\Facades\Auth;
use Modules\Quotation\Entities\Quotation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class QuotationsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('total_amount', function ($data) {
                return format_currency($data->total_amount);
            })
            ->addColumn('status', function ($data) {
                return view('quotation::partials.status', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('quotation::partials.actions', compact('data'));
            });
    }

    public function query(Quotation $model) {
        $current_company_id = Auth::user()->currentCompany->id;
        return $model->where('company_id', $current_company_id)->newQuery();
    }

    public function html() {
        return $this->builder()
            ->setTableId('sales-table')
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
                ->title('Date')
                ->className('text-center align-middle'),

            Column::make('reference')
                ->title('Référence')
                ->className('text-center align-middle'),

            Column::make('customer_name')
                ->title('Client')
                ->className('text-center align-middle'),

            Column::computed('status')
                ->className('text-center align-middle'),

            Column::computed('total_amount')
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
        return 'Quotations_' . date('YmdHis');
    }
}
