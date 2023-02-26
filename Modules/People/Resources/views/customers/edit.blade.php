@extends('layouts.master')

@section('title', 'Edit Customer')

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Edit Customer') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Update Customer') }} <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="customer_name">{{ __('Customer Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="customer_name" required value="{{ $customer->customer_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="customer_email">{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="customer_email" required value="{{ $customer->customer_email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="customer_phone">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="customer_phone" required value="{{ $customer->customer_phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="city">{{ __('City') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="city" required value="{{ $customer->city }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="country">{{ __('Country') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="country" required value="{{ $customer->country }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">{{ __('Address') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" required value="{{ $customer->address }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

