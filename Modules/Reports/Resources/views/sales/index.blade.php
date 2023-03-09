@extends('layouts.master')

@section('title', __('Rapport des ventes'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Rapport des ventes') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <livewire:reports.sales-report :customers="\Modules\People\Entities\Customer::all()"/>
        </div>
    </div>

@endsection
