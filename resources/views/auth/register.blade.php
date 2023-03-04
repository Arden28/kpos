@extends('layouts.auth')

@section('page_title', trans('auth.get_started'))

@section('content')
<div class="row g-0 flex-fill">
  <div class="col-12 col-lg-6 col-xl-6 border-top-wide border-primary d-flex flex-column justify-content-center">
    <div class="container container-tight my-5 px-lg-5">
      <div class="text-center mb-4">
        <a href="#" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo.png')}}" height="170" alt=""></a>
      </div>
      <h2 class="h3 text-center mb-3">
        {{ trans('auth.started') }}
      </h2>

      <livewire:auth.register />

      {{-- <form method="post" action="{{ route('register.store') }}">
          @csrf

        <div class="hr-text">{{ trans('auth.information.personal') }}</div>

        <div class="mb-3">
          <label class="form-label">{{ trans('auth.name') }}</label>
          <input type="text" placeholder="MASSAMBA Judie" class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">{{ trans('auth.phone.label') }}</label>
          <input type="tel" placeholder="064074926" class="form-control" @error('phone') is-invalid @enderror"
                name="phone" value="{{ old('phone') }}">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ trans('auth.email.label') }}</label>
            <input type="email" placeholder="massambajudie@koverae.com" class="form-control" @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">
              {{ trans('auth.mdp.label') }}
              <span class="form-label-description">
                <a href="forgot-password.html">{{ trans('auth.mdp.forget') }}</a>
              </span>
            </label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="{{ trans('auth.mdp.placeholder') }}">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                </a>
              </span>
            </div>
        </div>

        <div class="mb-2">
          <label class="form-label">
            {{ trans('auth.mdp.confirm') }}
          </label>
          <div class="input-group input-group-flat">
            <input type="password"  class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation" placeholder="{{ trans('auth.mdp.confirm_placeholder') }}">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <span class="input-group-text">
              <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
              </a>
            </span>
          </div>
        </div>

        <div class="hr-text">{{ trans('auth.information.professional') }}</div>

        <div class="mb-3">
            <label class="form-label">{{ trans('auth.company.name') }}</label>
            <input type="text" placeholder="Ex: ETS Maire Reine" class="form-control @error('company_name') is-invalid @enderror"
                name="company_name" value="{{ old('company_name') }}">
            @error('company_name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ trans('auth.company.activity') }}</label>
            <select class="form-control @error('type') is-invalid @enderror"
                name="type">
                <option value="">{{ trans('auth.company.activities.select') }}</option>
                <option value="Magasin de vêtements">{{ __('Magasin de vêtements') }}</option>
                <option value="Magasin de bijoux">{{ __('Magasin de bijoux') }}</option>
                <option value="Dépots de boissons">{{ __('Dépots de boissons') }}</option>
                <option value="Magasin d'électronique">{{ __("Magasin électronique") }}</option>
            </select>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ trans('auth.company.size') }}</label>
            <select class="form-control @error('company_size') is-invalid @enderror"
                name="company_size">
                <option value="">{{ trans('auth.company.sizes.select') }}</option>
                <option value="-5">< 5 {{ __('employés') }}</option>
                <option value="5+">5 - 20 {{ __('employés') }}</option>
                <option value="20+">20 - 50 {{ __('employés') }}</option>
                <option value="50+">> 50 {{ __('employés') }}</option>
            </select>
            @error('company_size')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ trans('auth.company.interest') }}</label>
            <select class="form-control @error('primary_interest') is-invalid @enderror"
                name="primary_interest">
                <option value="">{{ trans('auth.company.interests.select') }}</option>
                <option value="Pour mieux gérer mes ventes">{{ __('Pour mieux gérer mes ventes') }}</option>
                <option value="Pour mieux gérer mon magasin">{{__('Pour mieux gérer mon magasin')}}</option>
                <option value="Je n'ai pas de raison particulière">{{ __("Je n'ai pas de raison particulière") }}</option>
            </select>
            @error('primary_interest')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">{{ trans('auth.register') }}</button>
        </div>
      </form> --}}

    </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-6 d-none d-lg-block">
    <!-- Photo -->
    <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg')}})"></div>
  </div>
</div>
@endsection

