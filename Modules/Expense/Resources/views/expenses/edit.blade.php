@extends('layouts.master')

@section('title', __('Modifier une dépense - Finance & Facturation'))


@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Modifier une dépense') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form id="expense-form" action="{{ route('expenses.update', $expense) }}" method="POST">
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
                                            <label for="reference">{{ __('Référence') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required value="{{ $expense->reference }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="date">Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date" required value="{{ $expense->getAttributes()['date'] }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="category_id">{{ __('Catégorie') }} <span class="text-danger">*</span></label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                @foreach(\Modules\Expense\Entities\ExpenseCategory::all() as $category)
                                                    <option {{ $category->id == $expense->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="amount">{{ __('Montant') }} <span class="text-danger">*</span></label>
                                            <input id="amount" type="text" class="form-control" name="amount" required value="{{ $expense->amount }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="details">{{ __('Détails') }}</label>
                                    <textarea class="form-control" rows="6" name="details">{{ $expense->details }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#amount').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });

            $('#amount').maskMoney('mask');

            $('#expense-form').submit(function () {
                var amount = $('#amount').maskMoney('unmasked')[0];
                $('#amount').val(amount);
            });
        });
    </script>
@endpush
