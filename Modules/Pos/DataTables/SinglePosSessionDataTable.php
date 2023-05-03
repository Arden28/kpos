<?php

namespace Modules\Pos\DataTables;

use App\Traits\CompanySession;
use Illuminate\Support\Facades\Auth;
use Modules\Pos\Entities\PhysicalPosSession;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Traits\PosSession;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SinglePosSessionDataTable extends DataTable
{
    use CompanySession, PosSession;

    protected $pos;

    public function __construct($pos = null)
    {
        // dd($pos);
        $this->pos = $pos;
    }

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('start_amount', function ($data) {
                return format_currency($data->start_amount);
            })
            ->addColumn('end_amount', function ($data) {
                return format_currency($data->end_amount);
            })
            ->addColumn('expected_amount', function ($data) {
                return format_currency($data->expected_amount);
            })
            ->addColumn('gap', function ($data) {
                return format_currency($data->gap);
            })
            ->addColumn('action', function ($data) {
                return view('pos::pos.sessions.partials.actions', compact('data'));
            });
    }

    public function query(PhysicalPosSession $model) {

        $current_company_id = Auth::user()->currentCompany->id;
        return $model->where('pos_id', $this->pos)->orderBy('id', 'DESC')->newQuery()->with('cashier');// A modifier en fonction de la company en cours d'utilisation

    }

    public function html() {
        return $this->builder()
            ->setTableId('physical_pos_sessions-table')
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
            Column::make('start_date')
                ->title('Date d\'ouverture')
                ->addClass('text-center'),

            Column::make('end_date')
                ->title('Date de fermeture')
                ->addClass('text-center'),

            Column::make('cashier.name')
                ->addClass('text-center')
                ->title('Ouvert Par'),

            Column::make('start_amount')
                ->addClass('text-center')
                ->title('Solde d\'ouverture'),

            Column::make('note')
                ->addClass('text-center')
                ->title('Note d\'ouverture'),

            Column::make('end_amount')
                ->addClass('text-center')
                ->title('Solde de fermeture'),

            Column::make('expected_amount')
                ->addClass('text-center')
                ->title('Solde attendue'),

            Column::make('gap')
                ->addClass('text-center')
                ->title('Ecart'),

            Column::computed('action')
                ->exportable(true)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename() {
        return 'Pdv_sessions - ' . date('D d-m-Y H:i:s');
    }

}
