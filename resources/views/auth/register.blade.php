@extends('layouts.auth')

@section('page_title', 'Commençons à développer votre entreprise !')

@section('content')
<div class="row g-0 flex-fill">
  <div class="col-12 col-lg-6 col-xl-6 border-top-wide border-primary d-flex flex-column justify-content-center">
    <div class="container container-tight my-5 px-lg-5">
      <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/logo.svg')}}" height="170" alt=""></a>
      </div>
      <h2 class="h3 text-center mb-3">
        {{ __('Commençons maintenant à développer votre entreprise') }}
      </h2>

<<<<<<< HEAD
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('register') }}">
        @csrf
=======
      <livewire:auth.register />

      {{-- <form method="post" action="{{ route('register.store') }}">
          @csrf
>>>>>>> 68148aefd8ad231f9ce4c88aaece1bed137f337e

        <div class="hr-text">{{ __('Informations Personnelles') }}</div>

        <div class="mb-3">
          <label class="form-label">{{ __('Nom(s) et Prénom(s)') }}</label>
          <input type="text" placeholder="MASSAMBA Judie" class="form-control"
                name="name" value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('Téléphone') }}</label>
          <input type="tel" placeholder="064074926" class="form-control"
                name="phone" value="{{ old('phone') }}">
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Adresse Email') }}</label>
            <input type="email" placeholder="massambajudie@koverae.com" class="form-control"
                name="email" value="{{ old('email') }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="hr-text">{{ __('Informations Professionnelles') }}</div>

        <div class="mb-3">
            <label class="form-label">{{ __('Nom de l\'entreprise') }}</label>
            <input type="text" placeholder="Ex: ETS Maire Reine" class="form-control"
                name="company_name" value="{{ old('company_name') }}">
            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Quel est votre d\'activité ?') }}</label>
            <select class="form-control" name="type">
                <option value="">{{ __('Séléctionnez votre domain') }}</option>
                <option value="Magasin de vêtements">{{ __('Magasin de vêtements') }}</option>
                <option value="Magasin de bijoux">{{ __('Magasin de bijoux') }}</option>
                <option value="Dépots de boissons">{{ __('Dépots de boissons') }}</option>
                <option value="Magasin d'électronique">{{ __("Magasin électronique") }}</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Quelle est la taille de votre entreprise?') }}</label>
            <select class="form-control" name="company_size">
                <option value="">{{ __('Séléctionnez votre taille') }}</option>
                <option value="-5">< 5 {{ __('employés') }}</option>
                <option value="5+">5 - 20 {{ __('employés') }}</option>
                <option value="20+">20 - 50 {{ __('employés') }}</option>
                <option value="50+">> 50 {{ __('employés') }}</option>
            </select>
            <x-input-error :messages="$errors->get('company_size')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Pourquoi utiliser Koverae ?') }}</label>
            <select class="form-control" name="primary_interest">
                <option value="">{{ __('Faites votre choix') }}</option>
                <option value="Pour mieux gérer mes ventes">{{ __('Pour mieux gérer mes ventes') }}</option>
                <option value="Pour mieux gérer mon magasin">{{__('Pour mieux gérer mon magasin')}}</option>
                <option value="Je n'ai pas de raison particulière">{{ __("Je n'ai pas de raison particulière") }}</option>
            </select>
            <x-input-error :messages="$errors->get('primary_interest')" class="mt-2" />
        </div>

        <div class="hr-text">{{ __('Informations de sécurité') }}</div>

        <div class="mb-2">
            <label class="form-label">
              {{ __('Mot de passe') }}
            </label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" name="password" placeholder="{{ __('********') }}">
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
            {{ __('Confirmer Mot de passe') }}
          </label>
          <div class="input-group input-group-flat">
            <input type="password"  class="form-control"
                name="password_confirmation" placeholder="{{ __('********') }}">
            <span class="input-group-text">
              <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
              </a>
            </span>
          </div>
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">{{ __('Commencer') }}</button>
        </div>
      </form> --}}

    </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-6 d-none d-lg-block">
    <!-- Photo -->
    <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('assets/static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg')}})"></div>
  </div>
</div>
@endsection

