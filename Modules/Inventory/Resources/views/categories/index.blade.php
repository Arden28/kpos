@extends('layouts.master')

@section('title', trans('module.inventory.categories.title'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ trans('module.inventory.categories.title') }}
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryCreateModal">
                                {{ trans('module.inventory.categories.add') }} <i class="bi bi-plus"></i>
                            </button>

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

        <!-- Create Modal -->
        <div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoryCreateModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryCreateModalLabel">{{ trans('module.inventory.categories.add') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('product-categories.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="category_code">{{ trans('module.inventory.categories.form.code') }} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="category_code" required>
                            </div>
                            <div class="form-group">
                                <label for="category_name">{{ trans('module.inventory.categories.form.name') }} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="category_name" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ trans('module.inventory.categories.add') }} <i class="bi bi-check"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}
@endpush
