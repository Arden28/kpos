@extends('layouts.master')

@section('title', __('Mettre à jour le Fournisseur - CRM'))


@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Mettre à jour le Fournisseur') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Sauvegarder') }} <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="supplier_name">{{ __('Nom du fournisseur') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="supplier_name" required value="{{ $supplier->supplier_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="supplier_email">{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="supplier_email" required value="{{ $supplier->supplier_email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="supplier_phone">{{ __('Téléphone') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="supplier_phone" required value="{{ $supplier->supplier_phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="city">{{ __('Ville') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="city" required value="{{ $supplier->city }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="country">{{ __('Pays') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="country" required value="{{ $supplier->country }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">{{ __('Adresse') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" required value="{{ $supplier->address }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

