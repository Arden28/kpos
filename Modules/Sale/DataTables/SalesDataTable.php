<?php

namespace Modules\Sale\DataTables;

use App\Traits\CompanySession;
use Illuminate\Support\Facades\Auth;
use Modules\Sale\Entities\Sale;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SalesDataTable extends DataTable
{
    use CompanySession;

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
                return view('sale::partials.actions', compact('data'));
            });
    }

    public function query(Sale $model) {
        // A modifier
        // $current_company_id = Auth::user()->currentCompany->id;
        $current_company_id = Auth::user()->currentCompany->id;
        return $model->where('company_id', $current_company_id)->orderBy('id', 'DESC')->newQuery()->with('seller');
    }

    public function html() {
        return $this->builder()
            ->setTableId('sales-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-md-3'l><'col-md-5 mb-2'B><'col-md-4'f>> .
                                'tr' .
                                <'row'<'col-md-5'i><'col-md-7 mt-2'p>>")
            ->orderBy(8)
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
                ->className('text-center align-middle'),

            Column::make('customer_name')
                ->title('Client')
                ->className('text-center align-middle'),

            Column::make('seller.name')
                ->title('Vendeur')
                ->className('text-center align-middle'),

            Column::computed('status')
                ->className('text-center align-middle'),

            Column::computed('total_amount')
                ->title('Montant total')
                ->className('text-center align-middle'),

            Column::computed('paid_amount')
                ->title('Motant Payé')
                ->className('text-center align-middle'),

            Column::computed('due_amount')
                ->title('Reste à Payer')
                ->className('text-center align-middle'),

            Column::computed('note')
                ->title('Note')
                ->className('text-center align-middle'),

            Column::computed('payment_status')
                ->title('Status du Paiement')
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
        return 'Ventes_' . date('d m-Y H:i:s');
    }
}
