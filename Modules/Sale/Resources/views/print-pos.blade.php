<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('Ticket de Caisse') }} | Koverae.com</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @font-face {
            font-family: 'Arista';
            src: url('/assets/fonts/arista_pro/Arista-Pro-Fat-trial.ttf');
        }
        * {
            font-size: 13px;
            line-height: 17px;
            font-family: 'Arista', sans-serif;
        }
        h2 {
            font-size: 17px;
        }
        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }
        tr {border-bottom: 1px dashed #ddd;}
        td,th {padding: 7px 0;width: 50%;}

        table {width: 100%;}
        tfoot tr th:first-child {text-align: left;}

        .centered {
            text-align: center;
            align-content: center;
        }
        small{font-size:11px;}


        /* New style for the logo */
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .logo img {
            /* border-radius: 50%; */
        }

        p.by{
                font-size: 10px;
                font-family: 'sans-serif';
        }

        @media print {
            * {
                font-size:12px;
                line-height: 18px;
            }
            td,th {padding: 5px 0;}
            .hidden-print {
                display: none !important;
            }

            tbody::after {
                content: '';
                display: block;
                /* page-break-after: always; */
                page-break-inside: auto;
                page-break-before: avoid;
                orphans: 1;
                margin-top: 0;
                margin-bottom: 0;

            }
        }
    </style>
</head>
<body>

<div style="max-width:400px;margin:-45px auto">
    <div id="receipt-data">
        <div class="centered">
            <!-- Add logo section -->
            {{-- <div class="logo">
                <img src="{{ asset('assets/images/logo/logo-black-gd.png') }}" alt="Logo" width="85" height="auto">
            </div> --}}
            <h2 style="margin-bottom: 5px">
                {{ Auth::user()->currentCompany->name}}
            </h2>

            <p style="font-size: 11px;line-height: 15px;margin-top: 0">
                {{ Auth::user()->currentCompany->address }}
                <br>
                {{ Auth::user()->currentCompany->email }}, {{ Auth::user()->currentCompany->phone }}
            </p>
        </div>
        <p>
            {{-- {{ __('Date') }}: {{ \Carbon\Carbon::parse($sale->date)->locale('fr')->isoFormat('LL') }} {{ \Carbon\Carbon::parse($sale->date)->format('H:i:s') }}<br> --}}
            {{ __('Date') }}: {{ \Carbon\Carbon::parse($sale->date)->locale('fr')->isoFormat('LL LTS') }}<br>
            {{ __('Référence') }}: {{ $sale->reference }}<br>
            {{ __('Client') }}: {{ $sale->customer_name }} <br>
            @if($seller)
                {{ __('Caissier(ière)') }}: {{ $seller->name }}
            @endif
        </p>
        <table class="table-data">
            <tbody>
            @foreach($sale->saleDetails as $saleDetail)
                <tr>
                    <td colspan="2">
                        {{ $saleDetail->product->product_name }}
                        ({{ $saleDetail->quantity }} x {{ format_currency($saleDetail->price) }})
                    </td>
                    <td style="text-align:right;vertical-align:bottom">{{ format_currency($saleDetail->sub_total) }}</td>
                </tr>
            @endforeach

            @if($sale->tax_percentage)
                <tr>
                    <th colspan="2" style="text-align:left">{{__('Taxe')}} ({{ $sale->tax_percentage }}%)</th>
                    <th style="text-align:right">{{ format_currency($sale->tax_amount) }}</th>
                </tr>
            @endif
            @if($sale->discount_percentage)
                <tr>
                    <th colspan="2" style="text-align:left">{{ __('Réduction') }} ({{ $sale->discount_percentage }}%)</th>
                    <th style="text-align:right">{{ format_currency($sale->discount_amount) }}</th>
                </tr>
            @endif
            @if($sale->shipping_amount)
                <tr>
                    <th colspan="2" style="text-align:left">{{ __('Livraison') }}</th>
                    <th style="text-align:right">{{ format_currency($sale->shipping_amount) }}</th>
                </tr>
            @endif
            <tr>
                <th colspan="2" style="text-align:left">{{ __('Grand Total') }}</th>
                <th style="text-align:right">{{ format_currency($sale->total_amount) }}</th>
            </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr style="background-color:#ddd;">
                    <td class="centered" style="padding: 5px;">
                        {{ __('Paiement') }}: {{ $sale->payment_method }}
                    </td>
                    <td class="centered" style="padding: 5px;">
                        {{ __('Montant Payé') }}: {{ format_currency($sale->paid_amount) }}
                    </td>
                </tr>
                {{-- <tr style="border-bottom: 0;">
                    <td class="centered" colspan="3">
                        <div style="margin-top: 10px;">
                            {!! \Milon\Barcode\Facades\DNS1DFacade::getBarcodeSVG($sale->reference, 'C128', 1, 25, 'black', true) !!}
                        </div>
                    </td>
                </tr> --}}
                <tr style="border-bottom: 0;">
                    <td class="centered" colspan="2">
                        <div style="margin-top: -10px;">
                            {{-- <img src="{{ asset('assets/images/logo/koverae-1.png') }}" width="75px" height="75px" alt="Koverae.com"> --}}
                            <p>Merci et au revoir !</p>
                            <p class="by">{{ __('Fait avec') }}  Koverae </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
