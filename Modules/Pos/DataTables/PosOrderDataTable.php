<?php

namespace Modules\Pos\DataTables;

use App\Traits\CompanySession;
use Illuminate\Support\Facades\Auth;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Entities\PosSale;
use Modules\Pos\Traits\PosSession;
use Modules\Sale\Entities\Sale;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PosOrderDataTable extends DataTable
{
    use CompanySession, PosSession;

    public function dataTable($query) {
        return datatables()
            ->eloquent($query)->with('seller')
            ->addColumn('total_amount', function ($data) {
                return format_currency($data->total_amount);
            })
            ->addColumn('paid_amount', function ($data) {
                return format_currency($data->paid_amount);
            })
            ->addColumn('due_amount', function ($data) {
                return format_currency($data->due_amount);
            })
            ->addColumn('status', function ($data) {
                return view('sale::partials.status', compact('data'));
            })
            ->addColumn('payment_status', function ($data) {
                return view('sale::partials.payment-status', compact('data'));
            })
            ->addColumn('action', function ($data) {
                return view('pos::pos.orders.partials.actions', compact('data'));
            });
    }

    public function query(PosSale $model) {

        $current_company_id = Auth::user()->currentCompany->id;
        // return $model->where('company_id', Auth::user()->currentCompany->id)->newQuery()->with('sale', 'cashier');// A modifier en fonction de la company en cours d'utilisation

        return $model->orderBy('id', 'DESC')
        ->join('sales', 'pos_sales.sale_id', '=', 'sales.id')
        ->join('users', 'pos_sales.company_id', '=', 'users.current_company_id')
        ->select('pos_sales.*')
        ->with('sale', 'cashier')

        ->newQuery()->groupBy('id'); //Datas are duplicates, I have to fix it up
    }

    public function html() {
        return $this->builder()
            ->setTableId('pos_sales-table')
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
            Column::make('sale.date')
                ->title('Date')
                ->addClass('text-center'),

            Column::make('sale.reference')
                ->addClass('text-center')
                ->title('Numéro'),

            Column::make('sale.customer_name')
                ->addClass('text-center')
                ->title('Client'),

            Column::make('cashier.name')
                ->addClass('text-center')
                ->title('Caissier(ière)'),

                Column::computed('sale.total_amount')
                ->title('Montant total')
                ->className('text-center align-middle'),

            Column::computed('sale.paid_amount')
                ->title('Motant Payé')
                ->className('text-center align-middle'),

            Column::computed('sale.due_amount')
                ->title('Reste à Payer')
                ->className('text-center align-middle'),

            Column::computed('sale.payment_status')
                ->title('Status')
                ->className('text-center align-middle'),

            Column::computed('action')
                ->exportable(true)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('created_at')
                ->visible(false)
        ];
    }

    protected function filename() {
        return 'Pos_sales' . date('YmdHis');
    }
}
