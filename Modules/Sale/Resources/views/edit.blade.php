@extends('layouts.master')

@section('title', __('Modifier une vente'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Modifier une vente') }}
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
                            <form id="sale-form" action="{{ route('sales.update', $sale) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="reference">{{ __('Référence') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required value="{{ $sale->reference }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="customer_id">{{ __('Client') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="customer_id" id="customer_id" required>
                                                    @foreach(\Modules\People\Entities\Customer::all() as $customer)
                                                        <option {{ $sale->customer_id == $customer->id ? 'selected' : '' }} value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="seller_id">{{ __('Vendeur') }} </label>
                                                <select class="form-control" name="seller_id" id="seller_id">
                                                    <option value="0">{{ __('Selectionnez un vendeur') }}</option>
                                                    @foreach(\App\Models\User::where('current_company_id', Auth::user()->currentCompany->id)->get() as $seller)
                                                        <option {{ $sale->seller_id == $seller->id ? 'selected' : ''  }} value="{{ $seller->id }}">{{ $seller->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required value="{{ $sale->date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <livewire:product-cart :cartInstance="'sale'" :data="$sale"/>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option {{ $sale->status == 'Pending' ? 'selected' : '' }} value="Pending">En attente</option>
                                                <option {{ $sale->status == 'Shipped' ? 'selected' : '' }} value="Shipped">Livré</option>
                                                <option {{ $sale->status == 'Completed' ? 'selected' : '' }} value="Completed">Completée</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="payment_method">{{ __('Moyen de Paiement') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="payment_method" required value="{{ $sale->payment_method }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="paid_amount">{{ __('Montant Reçu') }} <span class="text-danger">*</span></label>
                                            <input id="paid_amount" type="text" class="form-control" name="paid_amount" required value="{{ $sale->paid_amount }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">{{ __('Note(si besoin)') }}</label>
                                    <textarea name="note" id="note" rows="5" class="form-control">{{ $sale->note }}</textarea>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sauvegarder') }} <i class="bi bi-check"></i>
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

            $('#sale-form').submit(function () {
                var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
                $('#paid_amount').val(paid_amount);
            });
        });
    </script>
@endpush
