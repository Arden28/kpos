@extends('layouts.auth')

@section('page_title', trans('auth.forgot.title'))

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

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
      <div class="card-body">
        <h2 class="card-title text-center mb-4">{{ trans('auth.forgot.label') }}</h2>
        <p class="text-muted mb-4">{{ trans('auth.forgot.message') }}</p>
        <div class="mb-3">
          <label class="form-label">{{ trans('auth.email.label') }}</label>
          <input type="email" name="email" placeholder="{{ trans('auth.email.placeholder') }}" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">
            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
            {{ trans('auth.forgot.submit') }}
          </button>
        </div>
      </div>
    </form>
    <div class="text-center text-muted mt-3">
      {{ trans('auth.forgot.remeber_it') }} <a href="{{ route('login') }}">{{ trans('auth.forgot.send_back') }}</a> {{ __('to the sign in screen.') }}
    </div>
  </div>
</div>
@endsection
