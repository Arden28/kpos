@extends('layouts.master')

@section('title', __('Ajoutez une vente annulée'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Ajoutez une vente annulée') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')
    <div class="page-header d-print-none">
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
                            <form id="purchase-return-form" action="{{ route('purchase-returns.store') }}" method="POST">
                                @csrf
                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="reference">Reference <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required readonly value="PRRN">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                                                <select class="form-control" name="supplier_id" id="supplier_id" required>
                                                    @foreach(\Modules\People\Entities\Supplier::all() as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required value="{{ now()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <livewire:product-cart :cartInstance="'purchase_return'"/>

                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="Pending">Pending</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Completed">Completed</option>
                                            </select>
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
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="paid_amount">Montant Payé <span class="text-danger">*</span></label>
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

                                <div class="form-group" style="padding-top: 10px;">
                                    @include('financial::includes.accounts.choice')
                                </div>

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
                $('#paid_amount').maskMoney('mask', {{ Cart::instance('purchase_return')->total() }});
            });

            $('#purchase-return-form').submit(function () {
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
