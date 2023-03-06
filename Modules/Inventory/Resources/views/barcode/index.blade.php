@extends('layouts.master')

@section('title', __('Print Barcode'))

@push('page_css')
    @livewireStyles
@endpush

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Print Barcode') }}
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
                    <livewire:search-product/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <livewire:barcode.product-table/>
                </div>
            </div>
        </div>
    </div>
@endsection
