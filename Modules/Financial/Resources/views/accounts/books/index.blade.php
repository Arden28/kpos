@extends('layouts.master')

@section('title', __('Livre de Comptes - '.$account->account_name.' - Finance & Facturation'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">

    <div class="container-xl col-12" style="margin-bottom: 10px">
        <div class="card">
          <div class="card-header">
            <h2>{{ $account->account_name }}</h2>
          </div>
          <div class="card-body">
            <div class="datagrid">
              <div class="datagrid-item">
                <div class="datagrid-title">{{ __('Nom du Compte :') }}</div>
                <div class="datagrid-content">{{ $account->account_name }}</div>
              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">{{ __('Type :') }}</div>
                <div class="datagrid-content"></div>
              </div>
              <div class="datagrid-item">
                <div class="datagrid-title">{{ __('Solde') }}</div>
                <div class="datagrid-content {{ $account->balance > 0 ? 'text-green' : 'text-red' }}">{{ format_currency($account->balance) }}</div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">

                @include('utils.alerts')


                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <hr>

                            <div class="table-responsive">
                                {!! $dataTable->table() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('page_scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endpush
