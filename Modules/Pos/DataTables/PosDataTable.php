<?php

namespace Modules\Pos\DataTables;

use Illuminate\Support\Facades\Auth;
use Modules\Pos\Entities\Pos;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PosDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return view('pos::pos.partials.actions', compact('data'));
            });
    }

    public function query(Pos $model) {

        $current_company_id = Auth::user()->currentCompany->id;
        return $model->where('company_id', $current_company_id)->newQuery();// A modifier en fonction de la company en cours d'utilisation
    }

    public function html() {
        return $this->builder()
            ->setTableId('pos-table')
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
            Column::make('name')
                ->addClass('text-center'),

            Column::make('name')
                ->addClass('text-center'),

            Column::make('name')
                ->addClass('text-center'),

            Column::computed('action')
                ->exportable(true)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename() {
        return 'Pos' . date('YmdHis');
    }
}
