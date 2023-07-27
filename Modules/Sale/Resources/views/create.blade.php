@extends('layouts.master')

@section('title', __('Ajouter une vente'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Ajouter une vente') }}
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

                                <div class="row" style="margin-bottom: 12px">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="reference">{{ __('Référence') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required readonly value="SL">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        {{-- <div class="from-group">
                                            <div class="form-group">
                                                <label for="customer_id">{{ __('Client') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="customer_id" id="customer_id" required>
                                                    @foreach(\Modules\People\Entities\Customer::where('company_id', Auth::user()->currentCompany->id)->get() as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-group" style="padding-bottom: 12px;">
                                            <label for="customer_id">{{ __('Client') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
                                                        <i class="bi bi-person-plus"></i>
                                                    </a>
                                                </div>
                                                <select name="customer_id" id="customer_id" class="form-control">
                                                    <option value="" selected>{{ __('Sélectionnez un Client') }}</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
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
                                                <label for="date">Date <span class="text-danger">*</span></label>
                                                {{-- <input type="date" class="form-control" name="date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"> --}}
                                                <input type="date" id="date" class="form-control" name="date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <livewire:product-cart :cartInstance="'sale'"/>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="Pending">{{ __('En attente') }}</option>
                                                <option value="Shipped">{{ __('Livrée') }}</option>
                                                <option value="Completed">{{ __('Complétée') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="payment_method">{{ __('Moyen de Paiement') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="payment_method" id="payment_method" required>
                                                    <option value="Cash">{{ __('En espèce') }}</option>
                                                    <option value="Credit Card">{{ __('Carte de Crédit') }}</option>
                                                    <option value="Bank Transfer">{{ __('Transfer Bancaire') }}</option>
                                                    <option value="Cheque">{{ __('Chèque') }}</option>
                                                    <option value="Other">{{ __('Autres') }}</option>
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
                                    <label for="note">{{__('Note (Si besoin)')}}</label>
                                    <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                                </div>

                                @include('financial::includes.accounts.choice')

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Ajouter <i class="bi bi-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('people::livewire.includes.customer-modal')

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
