@extends('layouts.master')

@section('title', __('Ajuster l\'inventaire'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Ajuster l\'inventaire') }}
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
                            <form action="{{ route('adjustments.store') }}" method="POST">
                                @csrf
                                <div class="row" style="padding-bottom: 12px;">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="reference">{{ __('Réference') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="reference" required readonly value="ADJ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="from-group">
                                            <div class="form-group">
                                                <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date" required value="{{ now()->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <livewire:adjustment.product-table/>
                                <div class="form-group">
                                    <label for="note">Note (Si besoin)</label>
                                    <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Ajuster <i class="bi bi-check"></i>
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
