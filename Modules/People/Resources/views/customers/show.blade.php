@extends('layouts.master')

@section('title', __('Customer Details'))


@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Customer Details') }}
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
                                        <th>Customer Name</th>
                                        <td>{{ $customer->customer_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Email</th>
                                        <td>{{ $customer->customer_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Phone</th>
                                        <td>{{ $customer->customer_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $customer->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>{{ $customer->country }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
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

