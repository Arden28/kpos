@extends('layouts.master')

@section('title', __('Show Adjustment'))

@push('page_css')
    @livewireStyles
@endpush

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Show Adjustment') }}
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2">
                                            {{ __('Date') }}
                                        </th>
                                        <th colspan="2">
                                            {{ __('Reference') }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            {{ $adjustment->date }}
                                        </td>
                                        <td colspan="2">
                                            {{ $adjustment->reference }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>{{ __('Product Name') }}</th>
                                        <th>{{ __('Code') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('Type') }}</th>
                                    </tr>

                                    @foreach($adjustment->adjustedProducts as $adjustedProduct)
                                        <tr>
                                            <td>{{ $adjustedProduct->product->product_name }}</td>
                                            <td>{{ $adjustedProduct->product->product_code }}</td>
                                            <td>{{ $adjustedProduct->quantity }}</td>
                                            <td>
                                                @if($adjustedProduct->type == 'add')
                                                    (+) {{ __('Addition') }}
                                                @else
                                                    (-) {{ __('Subtraction') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
