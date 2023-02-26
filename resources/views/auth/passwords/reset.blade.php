@extends('layouts.auth')

@section('content')
<div class="page page-center">
  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo.png') }}" height="170" alt=""></a>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="post" action="{{ url('/auth/password/reset') }}">
        @csrf
      <div class="card-body p-4" style="border: 12px;">
        <h2 class="card-title text-center mb-4">{{ __('Reset password') }}</h2>
        <p class="text-muted mb-4">{{ __('Enter email and new password.') }}</p>

        <div class="mb-3">
          <label class="form-label">{{ __('Email address') }}</label>
          <input type="email" name="email" placeholder="{{ __('Your Email') }}" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ $email ?? old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Email address') }}</label>
            <input type="password" name="password" placeholder="{{ __('Your Email') }}" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Email address') }}</label>
            <input type="password" name="password_confirmation" class="form-control"
                placeholder="Confirm password">
        </div>

        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">
            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
            {{ __('Reset Password') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
