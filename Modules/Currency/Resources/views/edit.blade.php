@extends('layouts.master')

@section('title', __('Modifier une Devise'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Modifier une Devise') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{ route('currencies.update', $currency) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">Modifier une Devise <i class="bi bi-check"></i></button>
                            <a href="{{ url()->previous() }}" class="btn btn-warning">
                                {{ __('Retour') }} <i class="bi bi-arrow-return-left"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="currency_name">{{ __('Nom de la Devise') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="currency_name" required value="{{ $currency->currency_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="code">{{ __('Code de la Devise') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="code" required value="{{ $currency->code }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="symbol">{{ __('Symbole') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="symbol" required value="{{ $currency->symbol }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="thousand_separator">{{ __('Séparateur de millier') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="thousand_separator" required value="{{ $currency->thousand_separator }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="decimal_separator">{{ __('Séparateur de dizaine') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="decimal_separator" required value="{{ $currency->decimal_separator }}">
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

