@extends('layouts.auth')

@section('page_title', 'Konnectez vous à votre Kompte')


@section('content')
    <div class="page">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/images/logo/koverae-1.png') }}" height="170" alt="Koverae Logo"></a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">{{ __('Konnectez-vous à votre Kompte') }}</h2>

            <div class="card-body">
              <div class="row">
                  <div class="col-12">
                      <a href="#" class="btn w-100">
                          <!-- Download SVG icon from https://icons8.com/icon/set/google/color -->
                          <img src="{{ asset('assets/images/icons/google.svg') }}" width="24px" height="24px" alt="">
                          {{ __('Se konnecter avec Google') }}
                      </a>
                  </div>
                  <div class="col-12" style="margin-top: 10px">
                      <a href="#" class="btn w-100">
                          <!-- Download SVG icon from http://https://icons8.com/icon/set/facebook/color -->
                          <img src="{{ asset('assets/images/icons/facebook.svg') }}" width="24px" height="24px" alt="">
                          {{ __('Se konnecter avec Facebook') }}
                      </a>
                  </div>
              </div>
            </div>

            <div class="hr-text">{{__('ou')}}</div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

              <!--<div class="mb-3">
                <label class="form-label">{{ __('Adresse E-mail') }}</label>
                <input  type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="form-control" placeholder="vous@koverae.com">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

              </div>-->
              <div class="row g-2">
                <div class="mb-3">
                  <label class="form-label">{{ __('Numéro de téléphone') }}</label>
                  {{-- <input id="phone" type="tel" name="phone" autocomplete="phone" class="form-control"> --}}
                    <x-tel-input
                        id="phone"
                        name="phone"
                        class="form-control"
                    />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

              </div>

              <div class="mb-2">
                <label class="form-label">
                  {{ __('Mot de passe') }}
                  @if (Route::has('password.request'))
                  <span class="form-label-description">
                    <a href="{{ route('password.request') }}">{{ __('Je ne m\'en souviens plus !') }}</a>
                  </span>
                  @endif
                </label>
                <div class="input-group input-group-flat">
                  <input
                  type="password"
                  name="password"
                  required autocomplete="current-password"
                  class="form-control"
                  placeholder="{{ __('Votre mot de passe') }}"
                  id="password-input"
                   />
                  <span class="input-group-text">
                    <a
                    class="link-secondary"
                    title="Show password"
                    data-bs-toggle="tooltip"
                    onclick="togglePasswordVisibility()"
                    ><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                  </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input"/>
                  <span class="form-check-label">{{ __('Rester konnecté sur cet appareil') }}</span>
                </label>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Me konnecter') }}</button>
              </div>
            </form>
          </div>
          {{-- <div class="hr-text">{{__('ou')}}</div>
          <div class="card-body">
            <div class="row">
              <div class="col"><a href="#" class="btn w-100">
                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                  {{ __('Se konecter avec Github') }}
                </a></div>
              <div class="col"><a href="#" class="btn w-100">
                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                  Login with Twitter
                </a></div>
            </div>
          </div> --}}
        </div>
        <div class="text-center text-muted mt-3">
          {{ __('Vous n\'avez pas de compte ? ') }} <a href="{{ route('register') }}" tabindex="-1">{{ __('S\'inscrire') }}</a>
        </div>
      </div>
    </div>
@endsection

@section('scripts')

<script>
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password-input");
  var eyeIcon = document.querySelector(".link-secondary");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.innerHTML = '<!-- Download SVG icon from http://tabler-icons.io/i/eye-off -->\n' +
                        '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">\n' +
                        '  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>\n' +
                        '  <path d="M3 3l18 18m-2.582 -3.418c-.38 .34 -.88 .542 -1.418 .542h-12c-1.104 0 -2 -.896 -2 -2v-12c0 -.538 .202 -1.038 .542 -1.418" />\n' +
                        '  <path d="M14.828 9.172c.683 .683 1.683 .926 2.828 .662l1.35 -1.35c.45 -.45 .737 -1.067 .82 -1.735c.044 -.282 -.028 -.568 -.182 -.822c-.342 -.512 -.99 -.804 -1.666 -.804c-.89 0 -1.668 .53 -2.026 1.35c-.168 .312 -.287 .646 -.344 .992c-.008 .054 -.008 .108 0 .162c.157 1.065 .906 1.914 1.97 2.072zm-6.656 6.656c-.683 -.683 -1.683 -.926 -2.828 -.662l-1.35 1.35c-.45 .45 -.737 1.067 -.82 1.735c-.044 .282 .028 .568 .182 .822c.342 .512 .99 .804 1.666 .804c.89 0 1.668 -.53 2.026 -1.35c.168 -.312 .287 -.646 .344 -.992c.008 -.054 .008 -.108 0 -.162c-.157 -1.065 -.906 -1.914 -1.97 -2.072z" />\n' +
                        '</svg>';
  } else {
    passwordInput.type = "password";
    eyeIcon.innerHTML = '<!-- Download SVG icon from http://tabler-icons.io/i/eye -->\n' +
                        '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">\n' +
                        '  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>\n' +
                        '  <circle cx="12" cy="12" r="2" />\n' +
                        '  <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />\n' +
                        '</svg>';
  }
}
</script>
@endsection
