@extends('layouts.auth')

@section('page_title', __('Get Started For Free'))

@section('content')
<div class="row g-0 flex-fill">

  <div class="col-12 col-lg-6 col-xl-6 d-none d-lg-block">
    <!-- Photo -->
    <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg')}})"></div>
  </div>

  <div class="col-12 col-lg-6 col-xl-6 border-top-wide border-primary d-flex flex-column justify-content-center">
    <div class="container container-tight my-5 px-lg-5">
      <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/koverae-1.png') }}" height="170" alt="Koverae Logo"></a>
      </div>
      <h2 class="h3 text-center mb-3">
        {{ __("Essayer KPOS Pro Gratuitement !") }}
        <br />
      </h2>
      <div class="col-lg-12">
        <ul style="list-style: none">
            <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    {{ __('Gratuit pendant 30 jours') }}
            </li>
            <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    {{ __('Vous serez averti avant la fin de votre abonnement') }}
            </li>
        </ul>
      </div>

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
