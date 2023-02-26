@extends('layouts.master')

@section('title', __('Sale Payments'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Sale Payments') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-body d-print-none">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-body">
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
