@extends('layouts.master')

@section('title', __('Show Supplier'))


@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Show Supplier') }}
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
                                        <th>Supplier Name</th>
                                        <td>{{ $supplier->supplier_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier Email</th>
                                        <td>{{ $supplier->supplier_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier Phone</th>
                                        <td>{{ $supplier->supplier_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $supplier->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>{{ $supplier->country }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
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

