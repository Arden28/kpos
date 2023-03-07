@extends('layouts.master')

@section('title', $company->company_name)
@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                {{ __('My Company :') }} {{ $company->company_name }}
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">

            <a href="{{ route('companies.edit', $company->api_key) }}" class="btn btn-primary d-none d-sm-inline-block {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}">
                <i class="bi bi-pen"></i>
                {{ __('Edit ') }}
            </a>
            {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#modal-report">
                <i class="bi bi-plus"></i>
                {{ __('Add an order') }}
            </a> --}}

            </div>
        </div>

    </div>
</div>
</div>

@endsection

@section('content')
    <!-- Page body -->
    <div class="page-body d-print-none">
        <div class="container-xl mb-4">

            <div class="row">
                <div class="col-lg-9">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <tr>
                                        <th>{{ __('Company Name') }}</th>
                                        <td>{{ $company->company_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Company Email') }}</th>
                                        <td>{{ $company->company_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Company Phone') }}</th>
                                        <td>{{ $company->company_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Company Domain') }}</th>
                                        <td>{{ $company->domain }}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card h-100">
                        <div class="card-body">
                            @forelse($company->getMedia('images') as $media)
                                <img src="{{ $media->getUrl() }}" alt="Product Image" class="img-fluid img-thumbnail mb-2">
                            @empty
                                <img src="{{ $company->getFirstMediaUrl('images') }}" alt="company Image" class="img-fluid img-thumbnail mb-2">
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
