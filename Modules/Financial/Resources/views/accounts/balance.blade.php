@extends('layouts.master')

@section('title', __('Balance Comptable - Finance & Facturation'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">

    <div class="container-xl col-12" style="margin-bottom: 10px">
        <div class="card">
          <div class="card-header">
            <h2>{{ __('Balance Comptable') }}</h2>
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
            </div>
            <livewire:financial::accounting-balance />
        </div>
    </div>


@endsection
