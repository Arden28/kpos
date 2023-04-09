@extends('layouts.master')

@section('title', 'Modifier le Point de vente')

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Modifier le Point de vente') }} "{{ $pos->name }}"
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{ route('app.pos.update', $pos->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Sauvegarder') }} <i class="bi bi-check"></i></button>
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
                                            value="{{ $pos->name }}"
                                            placeholder="{{ __("Ex: Marie Reine Makelekele") }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">{{ __('Adresse') }} <span class="text-danger">*</span></label>
                                            <input type="text" name="address"  class="form-control @error('address') is-invalid @enderror"
                                            value="{{ $pos->address }}"
                                            placeholder="{{ __("Adresse") }}">
                                            @error('address')
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

