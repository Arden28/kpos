@extends('layouts.master')

@section('title', __('Ajouter un nouveau rôle - Ressources Humaines'))

@push('page_css')
    <style>
        .custom-control-label {
            cursor: pointer;
        }
    </style>
@endpush

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Ajouter un nouveau rôle') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            @include('utils.alerts')
            <form action="{{ route('roles.store') }}" method="POST">
                <div class="row">
                    <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{__('Ajouter')}} {{ __('Rôle') }} <i class="bi bi-check"></i>
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">{{ __('Nom du rôle') }} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label for="permissions">{{ __('Droits d\'accès') }} <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select-all">
                                            <label class="custom-control-label" for="select-all">{{ __('Attribuer tous les droits') }}</label>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- User Management Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    User Mangement
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_user_management" name="permissions[]"
                                                                    value="access_user_management" {{ old('access_user_management') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_user_management">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_own_profile" name="permissions[]"
                                                                    value="edit_own_profile" {{ old('edit_own_profile') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_own_profile">{{ __('Profile Personnel') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Currencies Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Currencies
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_currencies" name="permissions[]"
                                                                    value="access_currencies" {{ old('access_currencies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_currencies">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_currencies" name="permissions[]"
                                                                    value="create_currencies" {{ old('create_currencies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="create_currencies">{{ __('Ajouter') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_currencies" name="permissions[]"
                                                                    value="edit_currencies" {{ old('edit_currencies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_currencies">{{ __('Modifier') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_currencies" name="permissions[]"
                                                                    value="delete_currencies" {{ old('delete_currencies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="delete_currencies">{{__('Supprimer')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Reports -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{__('Rapports')}}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_reports" name="permissions[]"
                                                                    value="access_reports" {{ old('access_reports') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_reports">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Settings -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{__('Paramètres')}}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_settings" name="permissions[]"
                                                                    value="access_settings" {{ old('access_settings') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_settings">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>

                <!-- Financial Permissions -->
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ __('Finance') }}
                                </h2>
                                <div class="row">

                                    <!-- Financial Report -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Rapports Financiers') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_reports" name="permissions[]"
                                                                value="access_reports" {{ old('access_reports') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_reports">{{ __('Stats') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_notifications" name="permissions[]"
                                                                value="show_notifications" {{ old('show_notifications') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_notifications">{{ __('Notifications') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_month_overview" name="permissions[]"
                                                                value="show_month_overview" {{ old('show_month_overview') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_month_overview">{{__('Résumé Financier du mois')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_weekly_sales_purchases" name="permissions[]"
                                                                value="show_weekly_sales_purchases" {{ old('show_weekly_sales_purchases') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_weekly_sales_purchases">{{ __('Ventes et Commandes Semetriel') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_monthly_cashflow" name="permissions[]"
                                                                value="show_monthly_cashflow" {{ old('show_monthly_cashflow') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_monthly_cashflow">{{ __('Cashflow Mensuel') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Financial Paiement Account -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Compte de Paiement') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_account_management" name="permissions[]"
                                                                value="access_account_management" {{ old('access_account_management') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_account_management">{{ __('Accéder') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_account" name="permissions[]"
                                                                value="create_account" {{ old('create_account') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_account">{{ __('Ajouter') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="edit_account" name="permissions[]"
                                                                value="edit_account" {{ old('edit_account') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="edit_account">{{ __('Modifier') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_account" name="permissions[]"
                                                                value="delete_account" {{ old('delete_account') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_account">{{ __('Supprimer') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="close_account" name="permissions[]"
                                                                value="close_account" {{ old('close_account') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="close_account">{{__('Fermer')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="account_deposit" name="permissions[]"
                                                                value="account_deposit" {{ old('account_deposit') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="account_deposit">{{ __('Dépôt') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="account_withdrawal" name="permissions[]"
                                                                value="account_withdrawal" {{ old('account_withdrawal') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="account_withdrawal">{{ __('Retrait') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_account_book" name="permissions[]"
                                                                value="access_account_book" {{ old('access_account_book') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_account_book">{{ __('Livre de Comptes') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_account_book" name="permissions[]"
                                                                value="delete_account_book" {{ old('delete_account_book') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_account_book">{{ __('Supprimer Livre de Comptes') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Financial Expenses -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Dépenses') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_expenses" name="permissions[]"
                                                                value="access_expenses" {{ old('access_expenses') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_expenses">{{ __('Accéder') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_expenses" name="permissions[]"
                                                                value="create_expenses" {{ old('create_expenses') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_expenses">{{ __('Ajouter') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="edit_expenses" name="permissions[]"
                                                                value="edit_expenses" {{ old('edit_expenses') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="edit_expenses">{{__('Modifier')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_expenses" name="permissions[]"
                                                                value="delete_expenses" {{ old('delete_expenses') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_expenses">{{ __('Supprimer') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_expense_categories" name="permissions[]"
                                                                value="access_expense_categories" {{ old('access_expense_categories') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_expense_categories">{{ __('Catégorie') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inventory Permissions -->
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ __('Inventaire') }}
                                </h2>
                                <div class="row">

                                    <!-- Products Permission -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Produits') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_products" name="permissions[]"
                                                                value="access_products" {{ old('access_products') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_products">{{__('Accéder')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_products" name="permissions[]"
                                                                value="show_products" {{ old('show_products') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_products">{{__('Voir')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_products" name="permissions[]"
                                                                value="create_products" {{ old('create_products') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_products">{{__('Ajouter')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="edit_products" name="permissions[]"
                                                                value="edit_products" {{ old('edit_products') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="edit_products">{{__('Modifier')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_products" name="permissions[]"
                                                                value="delete_products" {{ old('delete_products') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_products">{{__('Supprimer')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_product_categories" name="permissions[]"
                                                                value="access_product_categories" {{ old('access_product_categories') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_product_categories">{{ __('Catégorie') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="print_barcodes" name="permissions[]"
                                                                value="print_barcodes" {{ old('print_barcodes') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="print_barcodes">{{ __('Générer & Imprimer Code-barre') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Adjustments Permission -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Adjustements') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_adjustments" name="permissions[]"
                                                                value="access_adjustments" {{ old('access_adjustments') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_adjustments">{{__('Accéder')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_adjustments" name="permissions[]"
                                                                value="create_adjustments" {{ old('create_adjustments') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_adjustments">{{__('Ajouter')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_adjustments" name="permissions[]"
                                                                value="show_adjustments" {{ old('show_adjustments') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_adjustments">{{__('Voir')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="edit_adjustments" name="permissions[]"
                                                                value="edit_adjustments" {{ old('edit_adjustments') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="edit_adjustments">{{__('Modifier')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_adjustments" name="permissions[]"
                                                                value="delete_adjustments" {{ old('delete_adjustments') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_adjustments">{{__('Supprimer')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- CRM Permissions -->
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ __('Gestion Clients / Fournisseurs') }}
                                </h2>
                                <div class="row">


                                        <!-- Customers Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{__('Clients')}}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_customers" name="permissions[]"
                                                                    value="access_customers" {{ old('access_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_customers">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_customers" name="permissions[]"
                                                                    value="create_customers" {{ old('create_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="create_customers">{{__('Ajouter')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_customers" name="permissions[]"
                                                                    value="show_customers" {{ old('show_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="show_customers">{{__('Voir')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_customers" name="permissions[]"
                                                                    value="edit_customers" {{ old('edit_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_customers">{{__('Modifier')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_customers" name="permissions[]"
                                                                    value="delete_customers" {{ old('delete_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="delete_customers">{{__('Supprimer')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Suppliers Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{__('Fournisseurs')}}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_suppliers" name="permissions[]"
                                                                    value="access_suppliers" {{ old('access_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_suppliers">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_suppliers" name="permissions[]"
                                                                    value="create_suppliers" {{ old('create_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="create_suppliers">{{__('Ajouter')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_suppliers" name="permissions[]"
                                                                    value="show_suppliers" {{ old('show_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="show_suppliers">{{__('Voir')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_suppliers" name="permissions[]"
                                                                    value="edit_suppliers" {{ old('edit_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_suppliers">{{__('Modifier')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_customers" name="permissions[]"
                                                                    value="delete_customers" {{ old('delete_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="delete_customers">{{__('Supprimer')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales & Purchase Permissions -->
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ __('Ventes') }}
                                </h2>
                                <div class="row">

                                    <!-- Sales Permission -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Ventes') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_sales" name="permissions[]"
                                                                value="access_sales" {{ old('access_sales') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_sales">{{__('Accéder')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_sales" name="permissions[]"
                                                                value="create_sales" {{ old('create_sales') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_sales">{{__('Ajouter')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_sales" name="permissions[]"
                                                                value="show_suppliers" {{ old('show_sales') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_sales">{{__('Voir')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="edit_sales" name="permissions[]"
                                                                value="edit_sales" {{ old('edit_sales') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="edit_sales">{{__('Modifier')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_sales" name="permissions[]"
                                                                value="delete_sales" {{ old('delete_sales') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_sales">{{__('Supprimer')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_pos_sales" name="permissions[]"
                                                                value="create_pos_sales" {{ old('create_pos_sales') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_pos_sales">{{ __('Système POS') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_sale_payments" name="permissions[]"
                                                                value="access_sale_payments" {{ old('access_sale_payments') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_sale_payments">{{ __('Paiements') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sale Returns Permission -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Retour de Ventes') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_sale_returns" name="permissions[]"
                                                                value="access_sale_returns" {{ old('access_sale_returns') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_sale_returns">{{__('Accéder')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_sale_returns" name="permissions[]"
                                                                value="create_sale_returns" {{ old('create_sale_returns') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_sale_returns">{{__('Ajouter')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_sale_returns" name="permissions[]"
                                                                value="show_sale_returns" {{ old('show_sale_returns') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_sale_returns">{{__('Voir')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="edit_sale_returns" name="permissions[]"
                                                                value="edit_sale_returns" {{ old('edit_sale_returns') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="edit_sale_returns">{{__('Modifier')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_sale_returns" name="permissions[]"
                                                                value="delete_sale_returns" {{ old('delete_sale_returns') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_sale_returns">{{__('Supprimer')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_sale_return_payments" name="permissions[]"
                                                                value="access_sale_return_payments" {{ old('access_sale_return_payments') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_sale_return_payments">{{ __('Paiements') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quotations Permission -->
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <div class="card h-100 border-0 shadow">
                                            <div class="card-header">
                                                {{ __('Devis / Facture') }}
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="access_quotations" name="permissions[]"
                                                                value="access_quotations" {{ old('access_quotations') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="access_quotations">{{__('Accéder')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_quotations" name="permissions[]"
                                                                value="create_quotations" {{ old('create_quotations') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_quotations">{{__('Ajouter')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="show_quotations" name="permissions[]"
                                                                value="show_quotations" {{ old('show_quotations') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="show_quotations">{{__('Voir')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="edit_quotations" name="permissions[]"
                                                                value="edit_quotations" {{ old('edit_quotations') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="edit_quotations">{{__('Modifier')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="delete_quotations" name="permissions[]"
                                                                value="delete_quotations" {{ old('delete_quotations') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="delete_quotations">{{__('Supprimer')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="send_quotation_mails" name="permissions[]"
                                                                value="send_quotation_mails" {{ old('send_quotation_mails') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="send_quotation_mails">{{ __('Envoi par mail') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="create_quotation_sales" name="permissions[]"
                                                                value="create_quotation_sales" {{ old('create_quotation_sales') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="create_quotation_sales">{{ __('Du devis à la vente') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                        <!-- Purchases Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{ __('Achat') }}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_purchases" name="permissions[]"
                                                                    value="access_purchases" {{ old('access_purchases') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_purchases">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_purchases" name="permissions[]"
                                                                    value="create_purchases" {{ old('create_purchases') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="create_purchases">{{__('Ajouter')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_purchases" name="permissions[]"
                                                                    value="show_purchases" {{ old('show_purchases') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="show_purchases">{{__('Voir')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_purchases" name="permissions[]"
                                                                    value="edit_purchases" {{ old('edit_purchases') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_purchases">{{__('Modifier')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_purchases" name="permissions[]"
                                                                    value="delete_purchases" {{ old('delete_purchases') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="delete_purchases">{{__('Supprimer')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_purchase_payments" name="permissions[]"
                                                                    value="access_purchase_payments" {{ old('access_purchase_payments') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_purchase_payments">{{ __('Paiements') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Purchases Returns Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{ __('Retours d\'achat') }}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_purchase_returns" name="permissions[]"
                                                                    value="access_purchase_returns" {{ old('access_purchase_returns') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_purchase_returns">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_purchase_returns" name="permissions[]"
                                                                    value="create_purchase_returns" {{ old('create_purchase_returns') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="create_purchase_returns">{{__('Ajouter')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_purchase_returns" name="permissions[]"
                                                                    value="show_purchase_returns" {{ old('show_purchase_returns') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="show_purchase_returns">{{__('Voir')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_purchase_returns" name="permissions[]"
                                                                    value="edit_purchase_returns" {{ old('edit_purchase_returns') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_purchase_returns">{{__('Modifier')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_purchase_returns" name="permissions[]"
                                                                    value="delete_purchase_returns" {{ old('delete_purchase_returns') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="delete_purchase_returns">{{__('Supprimer')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_purchase_return_payments" name="permissions[]"
                                                                    value="access_purchase_return_payments" {{ old('access_purchase_return_payments') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_purchase_return_payments">{{ __('Paiements') }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- User Permissions -->
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ __('Gestion d\'utilisateurs') }}
                                </h2>
                                <div class="row">


                                        <!-- Customers Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{__('Clients')}}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_customers" name="permissions[]"
                                                                    value="access_customers" {{ old('access_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_customers">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_customers" name="permissions[]"
                                                                    value="create_customers" {{ old('create_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="create_customers">{{__('Ajouter')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_customers" name="permissions[]"
                                                                    value="show_customers" {{ old('show_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="show_customers">{{__('Voir')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_customers" name="permissions[]"
                                                                    value="edit_customers" {{ old('edit_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_customers">{{__('Modifier')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_customers" name="permissions[]"
                                                                    value="delete_customers" {{ old('delete_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="delete_customers">{{__('Supprimer')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Suppliers Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    {{__('Fournisseurs')}}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_suppliers" name="permissions[]"
                                                                    value="access_suppliers" {{ old('access_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="access_suppliers">{{__('Accéder')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_suppliers" name="permissions[]"
                                                                    value="create_suppliers" {{ old('create_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="create_suppliers">{{__('Ajouter')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_suppliers" name="permissions[]"
                                                                    value="show_suppliers" {{ old('show_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="show_suppliers">{{__('Voir')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_suppliers" name="permissions[]"
                                                                    value="edit_suppliers" {{ old('edit_suppliers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="edit_suppliers">{{__('Modifier')}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_customers" name="permissions[]"
                                                                    value="delete_customers" {{ old('delete_customers') ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="delete_customers">{{__('Supprimer')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
        });
    </script>
@endpush
