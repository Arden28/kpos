<?php

namespace Modules\Product\DataTables;

use Illuminate\Support\Facades\Auth;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\Unit;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UnitsDataTable extends DataTable
{

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('is_decimal', function ($data) {
                if($data->product_price == 0) {
                    return __('Non');
                }else{
                    return __('Oui');
                }
            })
            ->addColumn('action', function ($data) {
                return view('product::units.partials.actions', compact('data'));
            });
    }

    public function query(Unit $model) {

        $current_company_id = Auth::user()->currentCompany->id;
        return $model->where('company_id', $current_company_id)->newQuery()->withCount('products');// A modifier en fonction de la company en cours d'utilisation
    }

    public function html() {
        return $this->builder()
            ->setTableId('units-table')
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
            Column::make('unit_name')
                ->title(__('Nom *'))
                ->addClass('text-center'),

            Column::make('unit_short_name')
                ->title(__('Nom court *'))
                ->addClass('text-center'),

            Column::make('is_decimal')
                ->title(__('Autoriser la décimale '))
                ->addClass('text-center'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename() {
        return 'Product-Units_' . date('d-m-Y H-i-s');
    }
}
