@extends('layouts.auth')

@section('page_title', 'Commençons à développer votre entreprise !')

@section('content')
<div class="row g-0 flex-fill">
  <div class="col-12 col-lg-6 col-xl-6 border-top-wide border-primary d-flex flex-column justify-content-center">
    <div class="container container-tight my-5 px-lg-5">
      <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/koverae-1.png') }}" height="170" alt="Koverae Logo"></a>
      </div>
      <h2 class="h3 text-center mb-3">
        {{ __('Commençons maintenant à développer votre entreprise') }}
      </h2>

      <div class="card-body">
        <div class="row">
        </div>
      </div>


      <x-auth-session-status class="mb-4" :status="session('status')" />

      {{-- <form id="myForm" method="POST" action="{{ route('register') }}">
        @csrf

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
            <label class="form-label">{{ __('Référence de l\'entreprise') }}</label>
            <input type="text" placeholder="Ex: MR" class="form-control"
                name="company_reference" value="{{ old('company_reference') }}">
            <x-input-error :messages="$errors->get('company_reference')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('Quel est votre d\'activité ?') }}</label>
            <select class="form-control" name="type">
                <option value="">{{ __('Séléctionnez votre domain') }}</option>
                <option value="clothing_store">{{ __('Magasin de vêtements') }}</option>
                <option value="jewelry_store">{{ __('Magasin de bijoux') }}</option>
                <option value="beverage_depot">{{ __('Dépots de boissons') }}</option>
                <option value="beverage_depot">{{ __('Dépots de ciments') }}</option>
                <option value="beverage_depot">{{ __('Dépots d\'eau') }}</option>
                <option value="electronics_store">{{ __("Magasin électronique") }}</option>
                <option value="retail_store">{{ __('Commerce de vente en détail') }}</option>
                <option value="minimarket">{{ __('Superette') }}</option>
                <option value="super_market">{{ __('Super Marché') }}</option>
                <option value="store_chain">{{ __("Chaîne de magasin") }}</option>
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
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://https://icons8.com/icon/eye -->
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
              <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://https://icons8.com/icon/eye -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
              </a>
            </span>
          </div>
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="form-footer">
          <button id="submitButton" type="submit" class="btn btn-primary w-100">{{ __('Commencer') }}</button>
        </div>
      </form> --}}

      <livewire:auth.register />

      <div class="text-center text-muted mt-3">
        {{ __('Vous êtes déjà un Kover ? ') }} <a href="{{ route('login') }}" tabindex="-1">{{ __('Retourner à la page de connexion') }}</a>
      </div>
    </div>
  </div><div class="col-12 col-lg-6 col-xl-6 d-none d-lg-block">
    <!-- Photo -->
    <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('assets/static/photos/auth-register-3.png')}})">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div style="background-color: white; padding: 20px; border-radius: 10px;">
          <h2 class="h2 text-center mb-3 ">
            {{ __("Plus de possibilités avec Koverae") }}
            <br />
          </h2>
          <div class="col-lg-auto align-items-center">
            <ul style="list-style: none">
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                {{ __('Basé dans le cloud, aucune installation requise') }}
              </li>
              <li style="margin-top: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                {{ __('Fonctionnalités de sécurité et d\'administration adaptée.') }}
              </li>
              <li style="margin-top: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                {{ __('Tranquilité d\'esprit grâce à une assistance 24h/24 et 7j/7') }}
              </li>
              <li style="margin-top: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                {{ __('Essaie sans frais pendant 30 jours, ') }} <br>
                {{ __('     facturation mensuelle ou annuelle à l\'issue de cette période') }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('page_scripts')
    <script>
        const form = document.getElementById('myForm');
        const submitButton = document.getElementById('submitButton');

        form.addEventListener('submit', () => {
            // Disable the submit button
            submitButton.disabled = true;
        });
    </script>
@endpush
