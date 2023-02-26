@extends('layouts.master')

@section('title', __('Add Payment'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Add Payment') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-body d-print-none">
        <div class="container-xl">
            <form id="payment-form" action="{{ route('sale-payments.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Add Payment') }} <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reference">Reference <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required readonly value="INV/{{ $sale->reference }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="date">Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date" required value="{{ now()->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="due_amount">Due Amount <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="due_amount" required value="{{ format_currency($sale->due_amount) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="amount">Amount <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="amount" type="text" class="form-control" name="amount" required value="{{ old('amount') }}">
                                                <div class="input-group-append">
                                                    <button id="getTotalAmount" class="btn btn-primary" type="button">
                                                        <i class="bi bi-check-square"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                                                <select class="form-control" name="payment_method" id="payment_method" required>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Credit Card">Credit Card</option>
                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea class="form-control" rows="4" name="note">{{ old('note') }}</textarea>
                                </div>

                                <input type="hidden" value="{{ $sale->id }}" name="sale_id">
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

            $('#getTotalAmount').click(function () {
                $('#amount').maskMoney('mask', {{ $sale->due_amount }});
            });

            $('#payment-form').submit(function () {
                var amount = $('#amount').maskMoney('unmasked')[0];
                $('#amount').val(amount);
            });
        });
    </script>
@endpush

