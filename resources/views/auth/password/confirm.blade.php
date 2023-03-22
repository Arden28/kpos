@extends('layouts.auth')

@section('page_title', __('Confirmez que c\'est bien vous'))

@section('content')
<div class="page page-center">

  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/koverae-1.png') }}" height="170" alt="Koverae Logo"></a>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
      <div class="card-body">
        <h2 class="card-title text-center mb-4">{{ __('Confirmer votre mot de passe') }}</h2>
        <p class="text-muted mb-4">{{ __('Veuillez confirmer votre mot de passe avant de continuer') }} </p>
        <div class="mb-3">
          <label class="form-label">Mot de passe</label>
          <input type="password" class="form-control @error('email') is-invalid @enderror" name="password"
                    required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">
            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
            {{ __('Confimer') }}
          </button>
        </div>
      </div>
    </form>
  </div>

</div>
@endsection
