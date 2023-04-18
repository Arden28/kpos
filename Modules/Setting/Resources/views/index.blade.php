@extends('layouts.master')

@section('title', __('Paramètes'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Paramètes Généraux') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">

                <div class="col-lg-12" style="padding-bottom: 20px;">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="bi bi-people" style="font-size: 15px;"></i> {{ __('Utilisateurs') }}</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('settings.update', $settings->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">

                                    <div class="col-lg-6" style="padding-bottom: 10px">
                                        <label for="company_name">{{ __('Inviter de nouveaux utilisateurs') }}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="company_name" placeholder="Saisir une adresse email" required>
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Inviter') }}
                                                    </button>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <p><i class="bi bi-people"></i> 2 {{ __('Utilisateur(s) actif(s)') }}</p>
                                            <p style="padding-left: 15px"><a href=""><i class="bi bi-arrow-right"></i> {{ __('Gérer les utilisateurs') }}</a></p>

                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-12" style="padding-bottom: 20px;">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="bi bi-building" style="font-size: 15px;"></i> {{ __('Société') }}</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('settings.update', $settings->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="company_name">{{ __('Nom de la société') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_name" value="{{ Auth::user()->currentCompany->name }}" placeholder="Ex: ETS Marie Reine" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="company_email">{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_email" value="{{ Auth::user()->currentCompany->email }}" placeholder="Ex: contact@mariereine.com" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="padding-bottom: 10px">
                                        <div class="form-group">
                                            <label for="company_phone">{{ __('Téléphone') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_phone" value="{{ Auth::user()->currentCompany->phone }}" placeholder="EX: +242064995612" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6" style="padding-bottom: 10px">
                                        <div class="form-group">
                                            <label for="company_address">{{ __('Adresse') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="company_address" value="{{ Auth::user()->currentCompany->address }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4" style="padding-bottom: 10px">
                                        <div class="form-group">
                                            <label for="notification_email">{{ __('Notification Email') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="notification_email" value="{{ $settings->notification_email }}" required>
                                        </div>
                                    </div>

                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-4" style="padding-bottom: 10px">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-currency">
                                                        <i class="bi bi-currency-exchange"></i>
                                                    </a>
                                                </div>
                                            {{-- <label for="default_currency_id">{{ __('Default Currency') }} <span class="text-danger">*</span></label> --}}
                                            <select name="default_currency_id" id="default_currency_id" class="form-control" required>
                                                <option>{{ __('Choisissez votre devise') }}</option>
                                                @foreach($currencies as $currency)
                                                    <option {{ $settings->default_currency_id == $currency->id ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->currency_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="padding-bottom: 10px">
                                        <div class="input-group">
                                            {{-- <label for="default_currency_position">{{ __('Placement Devise') }} <span class="text-danger">*</span></label> --}}
                                            <select name="default_currency_position" id="default_currency_position" class="form-control" required>
                                                <option value="">{{ __('Comment se place le symbole de votre devise ?') }}</option>
                                                <option {{ $settings->default_currency_position == 'prefix' ? 'selected' : '' }} value="prefix">{{ __('Avant') }}</option>
                                                <option {{ $settings->default_currency_position == 'suffix' ? 'selected' : '' }} value="suffix">{{ __('Après') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> {{ __('Sauvegarder') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                <div class="col-lg-12" style="padding-bottom: 20px;">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="bi bi-clipboard-data" style="font-size: 15px;"></i> {{ __('Statistiques') }}</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('settings.update', $settings->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">

                                    <div class="col-lg-6" style="padding-bottom: 10px">
                                        <label for="company_name">{{ __('Inviter de nouveaux utilisateurs') }}</label>
                                            <div class="input-group">
                                                <input type="checkbox" class="form-control" name="company_name" placeholder="Saisir une adresse email" required>
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Inviter') }}
                                                    </button>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <p><i class="bi bi-people"></i> 2 {{ __('Utilisateur(s) actif(s)') }}</p>
                                            <p style="padding-left: 15px"><a href=""><i class="bi bi-arrow-right"></i> {{ __('Gérer les utilisateurs') }}</a></p>

                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style="padding-bottom: 20px;">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="bi bi-box" style="font-size: 15px;"></i> {{ __('Applications') }}</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('settings.update', $settings->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">

                                    <div class="col-lg-6" style="padding-bottom: 10px">
                                        <div class="card">
                                          <div class="row g-0">
                                            <div class="col-auto">
                                              <div class="card-body">
                                                <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-2.png)"></div>
                                              </div>
                                            </div>
                                            <div class="col">
                                              <div class="card-body ps-0">
                                                <div class="row">
                                                  <div class="col">
                                                    <h3 class="mb-0"><a href="#">Frontend Web Engineer</a></h3>
                                                  </div>
                                                  <div class="col-auto fs-3 text-green">$140,000 - $180,000</div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md">
                                                    <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                                      <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                                        Center Pixel, Inc</div>
                                                      <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" /><line x1="9" y1="7" x2="13" y2="7" /><line x1="9" y1="11" x2="13" y2="11" /></svg>
                                                        Full-time or Contract</div>
                                                      <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                                        Remote / Palo Alto, CA</div>
                                                    </div>
                                                    <div class="mt-3 list mb-0 text-muted d-block d-sm-none">
                                                      <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                                        Center Pixel, Inc</div>
                                                      <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" /><line x1="9" y1="7" x2="13" y2="7" /><line x1="9" y1="11" x2="13" y2="11" /></svg>
                                                        Full-time or Contract</div>
                                                      <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                                        Remote / Palo Alto, CA</div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-auto">
                                                    <div class="mt-3 badges">
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">HTML</a>
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">CSS</a>
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">React</a>
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">+3</a>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card">
                                          <div class="row g-0">
                                            <div class="col-auto">
                                              <div class="card-body">
                                                <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-2.png)"></div>
                                              </div>
                                            </div>
                                            <div class="col">
                                              <div class="card-body ps-0">
                                                <div class="row">
                                                  <div class="col">
                                                    <h3 class="mb-0"><a href="#">Frontend Web Engineer</a></h3>
                                                  </div>
                                                  <div class="col-auto fs-3 text-green">$140,000 - $180,000</div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md">
                                                    <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                                      <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                                        Center Pixel, Inc</div>
                                                      <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" /><line x1="9" y1="7" x2="13" y2="7" /><line x1="9" y1="11" x2="13" y2="11" /></svg>
                                                        Full-time or Contract</div>
                                                      <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                                        Remote / Palo Alto, CA</div>
                                                    </div>
                                                    <div class="mt-3 list mb-0 text-muted d-block d-sm-none">
                                                      <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                                        Center Pixel, Inc</div>
                                                      <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" /><line x1="9" y1="7" x2="13" y2="7" /><line x1="9" y1="11" x2="13" y2="11" /></svg>
                                                        Full-time or Contract</div>
                                                      <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                                        Remote / Palo Alto, CA</div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-auto">
                                                    <div class="mt-3 badges">
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">HTML</a>
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">CSS</a>
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">React</a>
                                                      <a href="#" class="badge badge-outline text-muted border fw-normal badge-pill">+3</a>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @include('currency::livewire.includes.create-currency-modal')

@endsection

