@extends('layouts.master')

@section('title', __('Point Of Sales'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('POS') }}
        </h2>
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
                @include('utils.alerts')
                <div class="card">
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        {{-- <a href="{{ route('app.pos.create') }}" class="btn btn-primary">
                            {{ __('Nouveau') }} <i class="bi bi-plus"></i>
                        </a> --}}

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
