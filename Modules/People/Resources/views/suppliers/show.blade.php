@extends('layouts.master')

@section('title', __('Détails du Fournisseur - CRM '))


@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Détails du Fournisseur ' ) }} {{ $supplier->supplier_name }}
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
                                        <th>Nom du Fournisseur</th>
                                        <td>{{ $supplier->supplier_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email du Fournisseur</th>
                                        <td>{{ $supplier->supplier_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone du Fournisseur</th>
                                        <td>{{ $supplier->supplier_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ville</th>
                                        <td>{{ $supplier->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pays</th>
                                        <td>{{ $supplier->country }}</td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td>{{ $supplier->address }}</td>
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

