@extends('layouts.master')

@section('title', __('Détails Devis '. $quotation->reference))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Détails Devis '. $quotation->reference) }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-body d-print-none">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center">
                            <div>
                                {{ __('Référence') }}: <strong>{{ $quotation->reference }}</strong>
                            </div>
                            <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none" href="{{ route('quotations.pdf', $quotation->id) }}">
                                <i class="bi bi-printer"></i> {{ __('Imprimer') }}
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">{{ __('Info Companie') }}:</h5>
                                    <div><strong>{{ Auth::user()->currentCompany->name }}</strong></div>
                                    <div>{{ Auth::user()->currentCompany->address }}</div>
                                    <div>{{ __('Email') }}: {{ Auth::user()->currentCompany->email }}</div>
                                    <div>{{ __('Téléphone') }}: {{ Auth::user()->currentCompany->phone }}</div>
                                </div>

                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">{{ __('Info Client') }}:</h5>
                                    <div><strong>{{ $customer->customer_name }}</strong></div>
                                    <div>{{ $customer->address }}</div>
                                    <div>{{ __('Email') }}: {{ $customer->customer_email }}</div>
                                    <div>{{ __('Téléphone') }}: {{ $customer->customer_phone }}</div>
                                </div>

                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                                    <div>{{ __('Facture') }}: <strong>INV/{{ $quotation->reference }}</strong></div>
                                    <div>{{ __('Date') }}: {{ \Carbon\Carbon::parse($quotation->date)->format('d M, Y') }}</div>
                                    <div>
                                        {{ __('Status') }}: <strong>{{ $quotation->status }}</strong>
                                    </div>
                                    <div>
                                        {{ __('Status de Paiement') }}: <strong>{{ $quotation->payment_status }}</strong>
                                    </div>
                                </div>

                            </div>

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="align-middle">{{ __('Produit') }}</th>
                                        <th class="align-middle">{{ __('Prix Uinitaire') }}</th>
                                        <th class="align-middle">{{ __('Quantité') }}</th>
                                        <th class="align-middle">{{ __('Réduction') }}</th>
                                        <th class="align-middle">{{ __('Taxe') }}</th>
                                        <th class="align-middle">{{ __('Sub Total') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quotation->quotationDetails as $item)
                                        <tr>
                                            <td class="align-middle">
                                                {{ $item->product_name }} <br>
                                                <span class="badge badge-success">
                                                    {{ $item->product_code }}
                                                </span>
                                            </td>

                                            <td class="align-middle">{{ format_currency($item->unit_price) }}</td>

                                            <td class="align-middle">
                                                {{ $item->quantity }}
                                            </td>

                                            <td class="align-middle">
                                                {{ format_currency($item->product_discount_amount) }}
                                            </td>

                                            <td class="align-middle">
                                                {{ format_currency($item->product_tax_amount) }}
                                            </td>

                                            <td class="align-middle">
                                                {{ format_currency($item->sub_total) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 ml-md-auto">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="left"><strong>{{ __('Réduction') }} ({{ $quotation->discount_percentage }}%)</strong></td>
                                                <td class="right">{{ format_currency($quotation->discount_amount) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>{{ __('Taxe') }} ({{ $quotation->tax_percentage }}%)</strong></td>
                                                <td class="right">{{ format_currency($quotation->tax_amount) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>{{ __('Livraison') }}</strong></td>
                                                <td class="right">{{ format_currency($quotation->shipping_amount) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>{{ __('Grand Total') }}</strong></td>
                                                <td class="right"><strong>{{ format_currency($quotation->total_amount) }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

