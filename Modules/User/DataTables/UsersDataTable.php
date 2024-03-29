<?php

namespace Modules\User\DataTables;

use App\Models\CompanyUser;
use App\Models\User;
use App\Traits\CompanySession;
use Modules\User\Interfaces\EmployeeInterface;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    use CompanySession;

    protected $employeeRepository;

    public function __construct(EmployeeInterface $employeeRepository){

        $this->employeeRepository = $employeeRepository;

    }


    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('role', function ($data) {
                return view('user::users.partials.roles', [
                    'roles' => $data->getRoleNames()
                ]);
            })
            ->addColumn('action', function ($data) {
                return view('user::users.partials.actions', compact('data'));
            })
            ->addColumn('status', function ($data) {
                if ($data->is_active == 1) {
                    $html = '<span class="badge badge-success">Active</span>';
                } else {
                    $html = '<span class="badge badge-warning">Deactivated</span>';
                }

                return $html;
            })
            ->addColumn('image', function ($data) {
                $url = $data->getFirstMediaUrl('avatars');

                return '<img src="' . $url . '" style="width:50px;height:50px;" class="img-thumbnail rounded-circle"/>';
            })
            ->rawColumns(['image', 'status']);
    }

    public function query(User $model) {
        // Get All Employees
        return $this->employeeRepository->getAllEmployees($model);
    }

    public function html() {
        return $this->builder()
            ->setTableId('users-table')
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
            Column::computed('image')
                ->title(__('Image'))
                ->className('text-center align-middle'),

            Column::make('name')
                ->title(__('Nom(s) & Prénom(s'))
                ->className('text-center align-middle'),

            Column::make('email')
                ->title(__('Adresse Mail'))
                ->className('text-center align-middle'),

            Column::make('phone')
                ->title(__('Numéro de Téléphone'))
                ->className('text-center align-middle'),

            Column::computed('role')
                ->title(__('Désignation'))
                ->className('text-center align-middle'),

            Column::computed('status')
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
        return 'Users_' . date('YmdHis');
    }
}
