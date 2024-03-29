@extends('layouts.master')

@section('title', __('Ajouter un point de vente'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Ajouter un Point de vente') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{ route('app.pos.store.physical') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Ajouter') }} <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <br />
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12" style="margin-bottom: 10px">
                                        <div class="form-group">
                                            <label for="name">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}"
                                            placeholder="{{ __('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-bottom: 10px">
                                        <div class="form-group">
                                            <label for="address">{{ __('Adresse') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="address"  class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address') }}"
                                            placeholder="{{ __('address') }}">
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    @include('financial::includes.accounts.choice')

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('page_scripts')

    <script>
        const accountForm = document.getElementById('account-form');
        const showAccountFormButton = document.getElementById('show-account-form');
        let isAccountFormVisible = false;
        showAccountFormButton.addEventListener('click', function() {
            isAccountFormVisible = !isAccountFormVisible;
            accountForm.style.display = isAccountFormVisible ? 'block' : 'none';
            showAccountFormButton.innerHTML = isAccountFormVisible ? 'Cacher' : 'Connecter un Compte';
        });
    </script>

@endpush
