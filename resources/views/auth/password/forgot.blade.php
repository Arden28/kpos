@extends('layouts.auth')

@section('page_title', __('Mot de passe oublié !'))

@section('content')
<div class="page page-center">

  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/koverae-1.png') }}" height="170" alt="Koverae Logo"></a>
    </div>

    <form method="POST" action="{{ route('password.email') }}">
      <div class="card-body">
        <h2 class="card-title text-center mb-4">{{ __('Mot de passe oublié') }}</h2>
        <p class="text-muted mb-4">{{ __('Mot de passe oublié? Aucun problème. Faites-nous savoir votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe qui vous permettra d\'en choisir un nouveau.') }} </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
            @csrf
            <div class="mb-3">
            <label class="form-label">{{ __('Adresse Email') }}</label>
            <input  type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control" placeholder="Email">
            </div>
            <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
                <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
                {{ __('Envoyer') }}
            </button>
            </div>
      </div>
    </form>
  </div>

</div>
@endsection
