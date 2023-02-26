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
                            <button class="btn btn-primary">{{ __('Nouveau Point de vente') }} <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <br />
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12">
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

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

