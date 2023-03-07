@extends('layouts.auth')

@section('page_title', __('Réinitialisez votre mot de passe !'))

@section('content')
<div class="page page-center">

  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/logo.svg') }}" height="136" alt=""></a>
    </div>
      <div class="card-body">
        <h2 class="card-title text-center mb-4">{{ __('Mot de passe oublié') }}</h2>
        <p class="text-muted mb-4">{{ __('Réinitialisez votre mot de passe') }} </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label class="form-label">{{ __('Adresse Email') }}</label>
                <input  type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Nouveau mot de passe') }}</label>
                <input  type="password" name="password" value="{{ old('password') }}" required autofocus class="form-control" placeholder="{{ __('Nouveau Mot de passe') }}">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Confirmer mot de passe') }}</label>
                <input  type="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus class="form-control" placeholder="{{ __('Confirmer mot de passe') }}">
            </div>

            <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
                {{ __('Réinitialiser') }}
            </button>
            </div>
        </form>
      </div>
  </div>

</div>
@endsection
