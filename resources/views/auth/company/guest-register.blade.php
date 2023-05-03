@extends('layouts.auth')

@section('page_title', 'Bienvenue chez Koverae !')


@section('content')
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/koverae-1.png') }}" height="140" alt="Koverae Logo"></a>
        </div>
        <div class="card card-md" style="margin-top: -70px">
          <div class="card-body">
            <h3 class="text-center mb-4">{{ __('Veuillez Compléter votre compte') }}</h3>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register.guest') }}">
                @csrf
                <input type="hidden" name="invitation_token" value="{{ $invitation_token }}">

              <div class="mb-3">
                <label class="form-label">{{ __('Nom(s) & Prénom(s)') }}</label>
                <input  type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control" placeholder="MASSAMBA Judie">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('Adresse Email') }}</label>
                <input  type="email" name="email" value="{{ $email }}" required autofocus autocomplete="email" class="form-control" placeholder="marie-reine@koverae.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('Numéro de téléphone') }}</label>
                <input  type="tel" name="phone" value="{{ old('phone') }}" required autofocus autocomplete="phone" class="form-control" placeholder="+242065443223">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />

              </div>

              <div class="mb-2">
                <label class="form-label">
                  {{ __('Mot de passe') }}
                </label>
                <div class="input-group input-group-flat">
                  <input
                  type="password"
                  name="password"
                  required autocomplete="current-password"
                   class="form-control"  placeholder="{{ __('*********') }}">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                  </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>

              <div class="mb-2">
                <label class="form-label">
                  {{ __('Confirmez Mot de passe') }}
                </label>
                <div class="input-group input-group-flat">
                  <input
                  type="password"
                  name="password_confirmation"
                  required autocomplete="current-password"
                   class="form-control"  placeholder="{{ __('*********') }}">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                  </span>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>

              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input"/>
                  <span class="form-check-label">{{ __('J\'accepte les condition(s) & politiques d\'utilisation') }}</span>
                </label>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Confirmer') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
