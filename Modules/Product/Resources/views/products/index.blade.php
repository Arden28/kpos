@extends('layouts.master')

@section('title', trans('modules.pos.products.title'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{-- {{ trans('modules.pos.products.title') }} --}}
            Tous les produits
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
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                {{-- {{ trans('modules.pos.products.add') }} <i class="bi bi-plus"></i> --}}
                                Ajouter un produit <i class="bi bi-plus"></i>
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
