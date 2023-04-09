@extends('layouts.master')

@section('title', __('Modifier une Catégorie de dépense - Finance & Facturation'))


@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Modifier une Catégorie de dépense') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('expense-categories.update', $expenseCategory) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="category_name">{{ __('Nom de la Catégorie') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name" required value="{{ $expenseCategory->category_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="category_description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="category_description" id="category_description" rows="5">{{ $expenseCategory->category_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }} <i class="bi bi-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

