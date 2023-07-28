@extends('layouts.master')

@section('title', __('Modifier l\'achat'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Modifier l\'achat') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-body d-print-none">
        <div class="container-fluid mb-4">
            <div class="row">
                <div class="col-12">
                    <livewire:search-product/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @include('utils.alerts')
                            <form id="purchase-form" action="{{ route('purchases.update', $purchase) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="reference">{{ __('Référence') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required value="{{ $purchase->reference }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="supplier_id">{{ __('Fournisseur') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="supplier_id" id="supplier_id" required>
                                                    @foreach(\Modules\People\Entities\Supplier::all() as $supplier)
                                                        <option {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }} value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">{{__('Date')}} <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required value="{{ $purchase->date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $utility = 'purchase';
                                @endphp

                                <livewire:product-cart :cartInstance="'purchase'" :data="$purchase" :utility="$utility"/>

                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status">{{ ('Status') }} <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option {{ $purchase->status == 'Pending' ? 'selected' : '' }} value="Pending">{{ __('En Attente') }}</option>
                                                <option {{ $purchase->status == 'Ordered' ? 'selected' : '' }} value="Ordered">{{ __('En Cours') }}</option>
                                                <option {{ $purchase->status == 'Completed' ? 'selected' : '' }} value="Completed">{{ __('Livrée') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="payment_method">{{ __('Mode de Paiement') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="payment_method" required value="{{ $purchase->payment_method }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="paid_amount">{{ __('Montant Payé') }} <span class="text-danger">*</span></label>
                                            <input id="paid_amount" type="text" class="form-control" name="paid_amount" required value="{{ $purchase->paid_amount }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">{{ __('Note (Si besoin)') }}</label>
                                    <textarea name="note" id="note" rows="5" class="form-control">{{ $purchase->note }}</textarea>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Mettre à jour') }} <i class="bi bi-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#paid_amount').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
                allowZero: true,
            });

            $('#paid_amount').maskMoney('mask');

            $('#purchase-form').submit(function () {
                var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
                $('#paid_amount').val(paid_amount);
            });
        });
    </script>
@endpush
