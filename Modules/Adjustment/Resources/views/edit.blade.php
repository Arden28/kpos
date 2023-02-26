
@extends('layouts.master')

@section('title', __('Edit Adjustment'))

@push('page_css')
    @livewireStyles
@endpush

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Edit Adjustment') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-body d-print-none">
        <div class="container-xl mb-4">
            <div class="row">
                <div class="col-12">
                    <livewire:search-product/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @include('utils.alerts')
                            <form action="{{ route('adjustments.update', $adjustment) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reference">{{ __('Reference') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required value="{{ $adjustment->getAttributes()['reference'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required value="{{ $adjustment->getAttributes()['date'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <livewire:adjustment.product-table :adjustedProducts="$adjustment->adjustedProducts->toArray()"/>
                                <div class="form-group">
                                    <label for="note">{{ __('Note (If Needed)') }}</label>
                                    <textarea name="note" id="note" rows="5" class="form-control">
                                        {{ $adjustment->note }}
                                    </textarea>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Adjustment') }} <i class="bi bi-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
