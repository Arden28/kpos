{{-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sale Details</title>
    <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div style="text-align: center;margin-bottom: 25px;">
                    <img width="180" src="{{ public_path('images/logo-dark.png') }}" alt="Logo">
                    <h4 style="margin-bottom: 20px;">
                        <span>Reference::</span> <strong>{{ $sale->reference }}</strong>
                    </h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-xs-4 mb-3 mb-md-0">
                                <h4 class="mb-2" style="border-bottom: 1px solid #dddddd;padding-bottom: 10px;">Company Info:</h4>
                                <div><strong>
                                    {{ Auth::user()->currentCompany->name }}
                                </strong></div>
                                <div>
                                    {{ Auth::user()->currentCompany->address }}
                                </div>
                                <div>
                                    Email: {{ Auth::user()->currentCompany->email }}
                                </div>
                                <div>
                                    Phone: {{ Auth::user()->currentCompany->phone }}
                                </div>
                            </div>

                            <div class="col-xs-4 mb-3 mb-md-0">
                                <h4 class="mb-2" style="border-bottom: 1px solid #dddddd;padding-bottom: 10px;">Customer Info:</h4>
                                <div><strong>{{ $customer->customer_name }}</strong></div>
                                <div>{{ $customer->address }}</div>
                                <div>Email: {{ $customer->customer_email }}</div>
                                <div>Phone: {{ $customer->customer_phone }}</div>
                            </div>

                            <div class="col-xs-4 mb-3 mb-md-0">
                                <h4 class="mb-2" style="border-bottom: 1px solid #dddddd;padding-bottom: 10px;">Invoice Info:</h4>
                                <div>Invoice: <strong>INV/{{ $sale->reference }}</strong></div>
                                <div>Date: {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</div>
                                <div>
                                    Status: <strong>{{ $sale->status }}</strong>
                                </div>
                                <div>
                                    Payment Status: <strong>{{ $sale->payment_status }}</strong>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive-sm" style="margin-top: 30px;">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="align-middle">Product</th>
                                    <th class="align-middle">Net Unit Price</th>
                                    <th class="align-middle">Quantity</th>
                                    <th class="align-middle">Discount</th>
                                    <th class="align-middle">Tax</th>
                                    <th class="align-middle">Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sale->saleDetails as $item)
                                    <tr>
                                        <td class="align-middle">
                                            {{ $item->product_name }} <br>
                                            <span class="badge badge-success">
                                                    {{ $item->product_code }}
                                                </span>
                                        </td>

                                        <td class="align-middle">{{ format_currency($item->unit_price) }}</td>

                                        <td class="align-middle">
                                            @if($item->product_type == 'storable')
                                                {{ $item->quantity }}
                                            @endif
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
                            <div class="col-xs-4 col-xs-offset-8">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="left"><strong>Discount ({{ $sale->discount_percentage }}%)</strong></td>
                                        <td class="right">{{ format_currency($sale->discount_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Tax ({{ $sale->tax_percentage }}%)</strong></td>
                                        <td class="right">{{ format_currency($sale->tax_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Shipping)</strong></td>
                                        <td class="right">{{ format_currency($sale->shipping_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong>Grand Total</strong></td>
                                        <td class="right"><strong>{{ format_currency($sale->total_amount) }}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-xs-12">
                                <p style="font-style: italic;text-align: center">
                                    {{ Auth::user()->currentCompany->name }}
                                    &copy; {{ date('Y') }}.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ Auth::user()->currentCompany->name }}</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 12px;
                margin: 36pt;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            strong {
                font-weight: bolder;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            table {
                border-collapse: collapse;
            }

            th {
                text-align: inherit;
            }

            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            h4, .h4 {
                font-size: 1.5rem;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .mt-5 {
                margin-top: 3rem !important;
            }

            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }

            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }.logo {
                text-align: center;
            }
            .logo img {
                display: block;
                margin: 0 auto;
            }

        </style>
    </head>

    <body>
        {{-- Header --}}
        {{-- @if($sale->logo)
            <img src="{{ $sale->getLogo() }}" alt="logo" height="100">
        @endif --}}
        {{-- <div class="logo">
            <img src="{{ asset('assets/images/logo/logo-black-gd.png') }}" alt="logo" width="130px">
        </div> --}}

        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong>{{ Auth::user()->currentCompany->name }}</strong>
                        </h4>
                    </td>
                    <td class="border-0 pl-0">
                        @if($sale->status)
                            <h4 class="text-uppercase cool-gray">
                                <strong>{{ $sale->status }}</strong>
                            </h4>
                        @endif
                        <p>{{ __('Ref No.') }} <strong>INV/{{ $sale->reference }}</strong></p>
                        <p>{{ __('Date de la facture') }}: <strong>{{ \Carbon\Carbon::parse($sale->date)->locale('fr')->isoFormat('LL LTS') }}</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%">
                        {{ __('Informations Entreprise') }}
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header">
                        {{ __('Informations Client') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        @if(Auth::user()->currentCompany->name)
                            <p class="seller-name">
                                <strong>{{ Auth::user()->currentCompany->name }}</strong>
                            </p>
                        @endif

                        @if(Auth::user()->currentCompany->address)
                            <p class="seller-address">
                                {{ __('Adresse') }}: {{ Auth::user()->currentCompany->address }}
                            </p>
                        @endif

                        @if(Auth::user()->currentCompany->code)
                            <p class="seller-code">
                                {{ __('Code') }}: {{ Auth::user()->currentCompany->code }}
                            </p>
                        @endif

                        @if(Auth::user()->currentCompany->vat)
                            <p class="seller-vat">
                                {{ __('TVA') }}: {{ Auth::user()->currentCompany->vat }}
                            </p>
                        @endif

                        @if(Auth::user()->currentCompany->phone)
                            <p class="seller-phone">
                                {{ __('Téléphone') }}: {{ Auth::user()->currentCompany->phone }}
                            </p>
                        @endif

                        {{-- @foreach(Auth::user()->currentCompany->custom_fields as $key => $value)
                            <p class="seller-custom-field">
                                {{ ucfirst($key) }}: {{ $value }}
                            </p>
                        @endforeach --}}
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0">
                        @if($customer->customer_name)
                            <p class="buyer-name">
                                <strong>{{ $customer->customer_name }}</strong>
                            </p>
                        @endif

                        @if($customer->customer_address)
                            <p class="buyer-address">
                                {{ __('Adresse') }}: {{ $customer->customer_address }}
                            </p>
                        @endif

                        @if($customer->customer_code)
                            <p class="buyer-code">
                                {{ __('Code') }}: {{ $customer->customer_code }}
                            </p>
                        @endif

                        @if($customer->customer_vat)
                            <p class="buyer-vat">
                                {{ __('TVA') }}: {{ $customer->customer_vat }}
                            </p>
                        @endif

                        @if($customer->customer_phone)
                            <p class="buyer-phone">
                                {{ __('Téléphone') }}: {{ $customer->customer_phone }}
                            </p>
                        @endif

                        {{-- @foreach(Auth::user()->currentCompany->custom_fields as $key => $value)
                            <p class="buyer-custom-field">
                                {{ ucfirst($key) }}: {{ $value }}
                            </p>
                        @endforeach --}}
                    </td>
                </tr>
                    </tbody>
                </table>

                {{-- Table --}}
                <table class="table table-items">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 pl-0">{{ __('Désignation') }}</th>
                            {{-- @if($invoice->hasItemUnits)
                                <th scope="col" class="text-center border-0">{{ __('invoices::invoice.units') }}</th>
                            @endif --}}
                            <th scope="col" class="text-center border-0">{{ __('Quantité') }}</th>
                            <th scope="col" class="text-right border-0">{{ __('Prix Unitaire') }}</th>
                            @if($sale->product_discount_percentage)
                                <th scope="col" class="text-right border-0">{{ __('Réduction') }}</th>
                            @endif
                            @if($sale->tax_percentage)
                                <th scope="col" class="text-right border-0">{{ __('Taxe') }}</th>
                            @endif
                            <th scope="col" class="text-right border-0 pr-0">{{ __('Sub total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Items --}}
                        @foreach($sale->saleDetails as $item)
                        <tr>
                            <td class="pl-0">
                                {{ $item->product_name }} <br>
                                <span class="badge badge-success" style="font-size: 10px;">
                                    {{ $item->product_code }}
                                </span>

                                {{-- @if($item->description)
                                    <p class="cool-gray">{{ $item->description }}</p>
                                @endif --}}
                            </td>
                            @if($sale->hasItemUnits)
                                <td class="text-center">{{ $item->units }}</td>
                            @endif
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-right">
                                {{ format_currency($item->unit_price) }}
                            </td>
                            @if($sale->product_discount_amount)
                                <td class="text-right">
                                    {{ format_currency($item->product_discount_amount) }}
                                </td>
                            @endif
                            @if($sale->product_tax_amount)
                                <td class="text-right">
                                    {{ format_currency($item->product_tax_amount) }}
                                </td>
                            @endif

                            <td class="text-right pr-0">
                                {{ format_currency($item->sub_total) }}
                            </td>
                        </tr>
                        @endforeach
                        {{-- Summary --}}
                        @if($sale->discount_amount)
                            <tr>
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Réduction') }} ({{ $sale->discount_percentage }})%</td>
                                <td class="text-right pr-0">
                                    {{ format_currency($sale->discount_amount) }}
                                </td>
                            </tr>
                        @endif
                        @if($sale->tax_amount)
                            <tr>
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Taxe') }}  ({{ $sale->tax_percentage }}%)</td>
                                <td class="text-right pr-0">
                                    {{ format_currency($sale->tax_amount) }}
                                </td>
                            </tr>
                        @endif
                        @if($sale->tax_rate)
                            <tr>
                                <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('invoices::invoice.tax_rate') }}</td>
                                <td class="text-right pr-0">
                                    {{ $sale->tax_percentage }}%
                                </td>
                            </tr>
                        @endif
                        {{-- @if($invoice->hasItemOrInvoiceTax())
                            <tr>
                                <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('invoices::invoice.total_taxes') }}</td>
                                <td class="text-right pr-0">
                                    {{ format_currency($invoice->total_taxes) }}
                                </td>
                            </tr>
                        @endif --}}
                        @if($sale->shipping_amount)
                            <tr>
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Livraison') }}</td>
                                <td class="text-right pr-0">
                                    {{ format_currency($sale->shipping_amount) }}
                                </td>
                            </tr>
                        @endif
                            <tr>
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Grand Total') }}</td>
                                <td class="text-right pr-0 total-amount">
                                    {{ format_currency($sale->total_amount) }}
                                </td>
                            </tr>
                    </tbody>
                </table>

                @if($sale->note)
                    <p>
                        {{ __('Notes') }}: {!! $sale->note !!}
                    </p>
                @endif

                {{-- <p>
                    {{ trans('invoices::invoice.amount_in_words') }}:
                </p>
                <p>
                    {{ trans('invoices::invoice.pay_until') }}:
                </p> --}}

                <div class="row" style="margin-top: 25px;">
                    <div class="col-xs-12">
                        <h4 style="text-align: center">
                            {{ Auth::user()->currentCompany->name }}
                            &copy; {{ date('Y') }}.
                        </h4>
                    </div>
                </div>

                <script type="text/php">
                    if (isset($pdf) && $PAGE_COUNT > 1) {
                        $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                        $size = 10;
                        $font = $fontMetrics->getFont("Verdana");
                        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                        $x = ($pdf->get_width() - $width);
                        $y = $pdf->get_height() - 35;
                        $pdf->page_text($x, $y, $text, $font, $size);
                    }
                </script>
            </body>
        </html>
