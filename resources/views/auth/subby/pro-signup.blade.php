@extends('layouts.auth')

@section('page_title', __('Commencer à développer votre entreprise gratuitement !'))

@section('content')
<div class="row g-0 flex-fill">

    <div class="col-12 col-lg-6 col-xl-6 d-none d-lg-block">
        <!-- Photo -->
        <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('assets/static/photos/auth-register-3.png')}})">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div style="background-color: white; padding: 20px; border-radius: 10px;">
              <h2 class="h2 text-center mb-3 ">
                {{ __("Plus de possibilités avec Koverae Pro") }}
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

  <div class="col-12 col-lg-6 col-xl-6 border-top-wide border-primary d-flex flex-column justify-content-center">
    <div class="container container-tight my-5 px-lg-5">
      <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/koverae-1.png') }}" height="170" alt="Koverae Logo"></a>
      </div>
      <h2 class="h3 text-center mb-3">
        {{ __("Essayer Koverae Pro Gratuitement !") }}
        <br />
      </h2>
      {{-- <div class="col-lg-12">
        <ul style="list-style: none">
            <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    {{ __('Gratuit pendant 30 jours') }}
            </li>
            <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    {{ __('Assistance personnelle pendant toute la durée de votre essaie') }}
            </li>
            <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    {{ __('Vous serez averti avant la fin de votre abonnement') }}
            </li>
        </ul>
      </div> --}}

      <livewire:auth.pro-register />

    </div>
  </div>

</div>
@endsection

@section('scripts')

    {{-- Disallow page refreshing --}}
    <script>
        window.addEventListener('beforeunload', function (e) {
        // Cancel the event
            e.preventDefault();
            // Chrome requires returnValue to be set
            e.returnValue = '';

            // Display a warning message
            const message = 'Are you sure you want to leave?';
            e.returnValue = message; // Set a custom message for some browsers
            return message; // Return the message for other browsers
        });
    </script>

@endsection
