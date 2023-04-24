@extends('layouts.master')

@section('title', __('Modifier un devis'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Modifier un devis') }}
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
                            <form id="quotation-form" action="{{ route('quotations.update', $quotation) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="reference">{{ __('Réference') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required value="{{ $quotation->reference }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="customer_id">{{ __('Clients') }} <span class="text-danger">*</span></label>
                                                <select class="form-control" name="customer_id" id="customer_id" required>
                                                    @foreach(\Modules\People\Entities\Customer::all() as $customer)
                                                        <option {{ $quotation->customer_id == $customer->id ? 'selected' : '' }} value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required value="{{ $quotation->getAttributes()['date'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <livewire:product-cart :cartInstance="'quotation'" :data="$quotation"/>

                                <div class="row" style="padding-top: 12px;">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option {{ $quotation->status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                                                <option {{ $quotation->status == 'Sent' ? 'selected' : '' }} value="Sent">Sent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">{{ __('Note (Si besoin)') }}</label>
                                    <textarea name="note" id="note" rows="5" class="form-control">{{ $quotation->note }}</textarea>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sauvegarder') }} <i class="bi bi-check"></i>
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

@push('page_scripts')

@endpush
