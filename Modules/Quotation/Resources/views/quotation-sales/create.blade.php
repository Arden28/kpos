@extends('layouts.master')

@section('title', __('Du dévis à la vente'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Du dévis à la vente') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-body d-print-none">
        <div class="container-xl mb-4">
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
                            <form id="sale-form" action="{{ route('sales.store') }}" method="POST">
                                @csrf

                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="reference">Référence <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required readonly value="SL">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="customer_id">Client <span class="text-danger">*</span></label>
                                                <select class="form-control" name="customer_id" id="customer_id" required>
                                                    @foreach(\Modules\People\Entities\Customer::all() as $customer)
                                                        <option {{ $sale->customer_id == $customer->id ? 'selected' : '' }} value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Vendeur à modifier --}}
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="seller_id">{{ __('Vendeur') }}</label>
                                                <select class="form-control" name="seller_id" id="seller_id" required>
                                                    @foreach(\App\Models\User::where('current_company_id', Auth::user()->currentCompany->id)->get() as $seller)
                                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required value="{{ now()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <livewire:product-cart :cartInstance="'sale'" :data="$sale"/>

                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="Pending">En cours</option>
                                                <option value="Shipped">Livré</option>
                                                <option value="Completed">Complété</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="payment_method">{{ __('Moyen de paiement') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="payment_method" id="payment_method" required>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Credit Card">Carte de Crédit</option>
                                                    <option value="Bank Transfer">Transfert Bancaire</option>
                                                    <option value="Cheque">Chèque</option>
                                                    <option value="Other">Autre</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="paid_amount">{{ __('Montant Reçu') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="paid_amount" type="text" class="form-control" name="paid_amount" required>
                                                <div class="input-group-append">
                                                    <button id="getTotalAmount" class="btn btn-primary" type="button">
                                                        <i class="bi bi-check-square"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">Note (Si besoin)</label>
                                    <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                                </div>

                                <input type="hidden" name="quotation_id" value="{{ $quotation_id }}">

                                @include('financial::includes.accounts.choice')

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ajouter') }} <i class="bi bi-check"></i>
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

            $('#getTotalAmount').click(function () {
                $('#paid_amount').maskMoney('mask', {{ Cart::instance('sale')->total() }});
            });

            $('#sale-form').submit(function () {
                var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
                $('#paid_amount').val(paid_amount);
            });
        });
    </script>

    <script>
        const accountForm = document.getElementById('account-form');
        const showAccountFormButton = document.getElementById('show-account-form');
        let isAccountFormVisible = false;
        showAccountFormButton.addEventListener('click', function() {
            isAccountFormVisible = !isAccountFormVisible;
            accountForm.style.display = isAccountFormVisible ? 'block' : 'none';
            showAccountFormButton.innerHTML = isAccountFormVisible ? 'Cacher' : 'Connecter un Compte';
        });
    </script>

@endpush
