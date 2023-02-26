@extends('layouts.master')

@section('title', __('Sale Detail'))

@section('breadcrumb')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">
          {{ __('Sale Detail') }}
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
            <i class="bi bi-printer"></i>
          {{ __('Print Invoice') }}
        </button>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
            <i class="bi bi-save"></i>
          {{ __('Save') }}
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center">
                            <div>
                                {{ __('Reference') }}: <strong>{{ $sale->reference }}</strong>
                            </div>
                            {{-- Print --}}
                            {{-- <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none" href="{{ route('sales.pdf', $sale->id) }}">
                                <i class="bi bi-printer"></i> Print
                            </a>
                            <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none" href="{{ route('sales.pdf', $sale->id) }}">
                                <i class="bi bi-save"></i> Save
                            </a> --}}
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">{{ __('Company Info') }}:</h5>
                                    <div><strong>{{ settings()->company_name }}</strong></div>
                                    <div>{{ settings()->company_address }}</div>
                                    <div>{{ __('Email') }}: {{ settings()->company_email }}</div>
                                    <div>{{ __('Phone') }}: {{ settings()->company_phone }}</div>
                                </div>

                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">{{ __('Customer Info') }}:</h5>
                                    <div><strong>{{ $customer->customer_name }}</strong></div>
                                    <div>{{ $customer->address }}</div>
                                    <div>{{ __('Email') }}: {{ $customer->customer_email }}</div>
                                    <div>{{ __('Phone') }}: {{ $customer->customer_phone }}</div>
                                </div>

                                <div class="col-sm-4 mb-3 mb-md-0">
                                    <h5 class="mb-2 border-bottom pb-2">{{ __('Invoice Info') }}:</h5>
                                    <div>{{ __('Invoice') }}: <strong>INV/{{ $sale->reference }}</strong></div>
                                    <div>{{ __('Date') }}: {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</div>
                                    <div>
                                        {{ __('Status') }}: <strong>{{ $sale->status }}</strong>
                                    </div>
                                    <div>
                                        {{ __('Payment Status') }}: <strong>{{ $sale->payment_status }}</strong>
                                    </div>
                                </div>

                            </div>

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="align-middle">{{ __('Product') }}</th>
                                        <th class="align-middle">{{ __('Net Unit Price') }}</th>
                                        <th class="align-middle">{{ __('Quantity') }}</th>
                                        <th class="align-middle">{{ __('Discount') }}</th>
                                        <th class="align-middle">{{ __('Tax') }}</th>
                                        <th class="align-middle">{{ __('Sub Total') }}</th>
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
                                            <td class="left"><strong>{{ __('Discount') }} ({{ $sale->discount_percentage }}%)</strong></td>
                                            <td class="right">{{ format_currency($sale->discount_amount) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>{{ __('Tax') }} ({{ $sale->tax_percentage }}%)</strong></td>
                                            <td class="right">{{ format_currency($sale->tax_amount) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>{{ __('Shipping') }}</strong></td>
                                            <td class="right">{{ format_currency($sale->shipping_amount) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>{{ __('Grand Total') }}</strong></td>
                                            <td class="right"><strong>{{ format_currency($sale->total_amount) }}</strong></td>
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

