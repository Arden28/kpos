@extends('layouts.master')

@section('title', __('Employees'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">

    <div class="container-xl col-12" style="margin-bottom: 10px">
        <div class="card">
          <div class="card-header">
            <h2>{{ __('Employés') }}</h2>
          </div>
        </div>
    </div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                {{ __('Ajouter un Employé') }} <i class="bi bi-plus"></i>
                            </a>

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
    {!! $dataTable->scripts() !!}
@endpush
