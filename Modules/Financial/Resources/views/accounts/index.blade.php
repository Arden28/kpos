@extends('layouts.master')

@section('title', __('Comptes de Paiement - Finance & Facturation'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Comptes de Paiement') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">

                @include('utils.alerts')

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @can('create_account')
                                <a class="btn btn-primary"  data-toggle="modal" data-target="#accountCreateModal">
                                    {{ __('Ajouter un compte') }} <i class="bi bi-plus"></i>
                                </a>
                            @endcan

                            <hr>

                            <div class="table-responsive">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Create Modal -->
    <div class="modal fade" id="accountCreateModal" tabindex="-1" role="dialog" aria-labelledby="accountCreateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountCreateModalLabel">{{ __('Ajouter un Compte de paiement') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="account-form" action="{{ route('account.store') }}" method="POST">
                    @csrf


                    <div class="modal-body">
                        <div class="form-group">
                            <label for="account_name">{{ __('Nom du Compte') }} <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="account_name" required>
                            {{-- <input class="form-control form-control-flush" type="text" name="account_name" required> --}}

                        </div>

                        <div class="form-group">
                            <label for="number">{{ __('Numéro du Compte') }} <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="number" required>
                        </div>

                        <div class="form-group">
                            <label for="balance">{{ __('Solde d\'ouverture') }} <span class="text-danger">*</span></label>
                            <input id="balance" type="text" class="form-control" name="balance" required>
                        </div>

                        <div class="form-group">
                            <label for="type_id">{{ __('Type de Compte') }}</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="" selected>{{ __('Selectionnez un type') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="note">{{ __('Remarque') }}</label>
                            <textarea class="form-control" name="note" id="note" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }} <i class="bi bi-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}

    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#balance').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });

            $('#account-form').submit(function () {
                var balance = $('#balance').maskMoney('unmasked')[0];
                $('#balance').val(balance);
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function () {
            $('#amount').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });

            $('#deposit-form').submit(function () {
                var amount = $('#amount').maskMoney('unmasked')[0];
                $('#amount').val(amount);
            });
        });
    </script> --}}
@endpush
