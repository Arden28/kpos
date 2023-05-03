@extends('layouts.master')

@section('title', __('Produit '.$product->product_name) )

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Produit '.$product->product_name ) }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl mb-4">
            <div class="row mb-3 card">
                <div class="col-md-12 card-body">
                    {!! \Milon\Barcode\Facades\DNS1DFacade::getBarCodeSVG($product->product_code, $product->product_barcode_symbology, 2, 110) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <tr>
                                        <th>{{ __('Code du Produit') }}</th>
                                        <td>{{ $product->product_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Symbole de code barre') }}</th>
                                        <td>{{ $product->product_barcode_symbology }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Désignation') }}</th>
                                        <td>{{ $product->product_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Catégorie') }}</th>
                                        <td>{{ $product->category->category_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Prix d\'achat') }}</th>
                                        <td>{{ format_currency($product->product_cost) }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Prix de vente') }}</th>
                                        <td>{{ format_currency($product->product_price) }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Quantité') }}</th>
                                        @if($product->quantity <= $product->product_stock_alert)
                                            <td>{{ $product->product_quantity . ' ' . $product->product_unit }}</td>
                                        @else
                                            <td class="text-red">{{ $product->product_quantity . ' ' . $product->product_unit }} ({{ __('Veuillez-vous réapprovisionner !') }})</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>{{ __('Valeur du stock') }}</th>
                                        <td>
                                            {{ __('Valeur Brute') }}: {{ format_currency($product->product_cost * $product->product_quantity) }} /
                                            {{ __('Valeur de Vente') }}: {{ format_currency($product->product_price * $product->product_quantity) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Alert Quantity') }}</th>
                                        <td>{{ $product->product_stock_alert . ' ' . $product->product_unit }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Taxe') }} (%)</th>
                                        <td>{{ $product->product_order_tax ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Tax Type') }}</th>
                                        <td>
                                            @if($product->product_tax_type == 1)
                                                {{ __('Exclusive') }}
                                            @elseif($product->product_tax_type == 2)
                                                {{ __('Inclusive') }}
                                            @else
                                                {{ __('N/A') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Note') }}</th>
                                        <td>{{ $product->product_note ?? 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card h-100">
                        <div class="card-body">
                            @forelse($product->getMedia('images') as $media)
                                <img src="{{ $media->getUrl() }}" alt="Product Image" class="img-fluid img-thumbnail mb-2">
                            @empty
                                <img src="{{ $product->getFirstMediaUrl('images') }}" alt="Product Image" class="img-fluid img-thumbnail mb-2">
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



