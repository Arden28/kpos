@extends('layouts.master')

@section('title', __('Profil Client'))


@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Profil Client') }}
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>{{ __('Nom') }}</th>
                                        <td>{{ $customer->customer_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Email du client') }}</th>
                                        <td>{{ $customer->customer_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Numéro de téléphone du client') }}</th>
                                        <td>{{ $customer->customer_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Ville du client') }}</th>
                                        <td>{{ $customer->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Pays du client') }}</th>
                                        <td>{{ $customer->country }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Adresse') }}</th>
                                        <td>{{ $customer->address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

