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
                    <livewire:company.invitation />
                </div>

                {{-- <div class="col-lg-12" style="padding-bottom: 20px;">
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
                            </form>
                        </div>
                    </div>
                </div> --}}


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

                                    <div class="col-lg-4">
                                        <div class="form-group">

                                            <p><i class="bi bi-currency-exchange"></i> {{ $currencies->count() }} {{ __('Devise(s)') }}</p>
                                            <p style="padding-left: 15px"><a href="{{ route('currencies.index') }}"><i class="bi bi-arrow-right"></i> {{ __('Gérer les devises') }}</a></p>

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

                @can('access_applications')
                    <div class="col-lg-12" style="padding-bottom: 20px;">
                        @include('utils.alerts')
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0"><i class="bi bi-box" style="font-size: 15px;"></i> {{ __('Applications') }} {{ installed_apps(team(Auth::user()->team->id))->count() }}</h3>
                            </div>
                            <div class="card-body">
                                    <div class="row">

                                        @foreach(modules() as $module)
                                        <div class="col-lg-6" style="padding-bottom: 10px">
                                            <div class="card">
                                            <div class="row g-0">
                                                <div class="col-3">
                                                    <div class="card-body">
                                                        <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-7.png)"></div>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                <div class="card-body ps-0">
                                                    <div class="row">
                                                    <div class="col">
                                                        <h3 class="mb-0">{{ $module->name }}</h3>
                                                    </div>
                                                    <div class="col-auto fs-3 text-green">
                                                        @if($module->isInstalledBy($team))
                                                            <form method="POST" action="{{ route('module.uninstall', $module) }}">
                                                                @csrf
                                                                <button class="btn btn-danger" type="submit">
                                                                    <i class="bi bi-trash"></i>
                                                                    {{ __('Désinstaller') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form method="POST" action="{{ route('module.install', $module) }}">
                                                                        @csrf
                                                                <button class="btn btn-primary" type="submit">{{ __('Installer') }}</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                    </div>

                                                    <div class="row">

                                                    <div class="col-md">
                                                        <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                                            <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                                                Par <strong>Koverae SA</strong>
                                                            </div>
                                                            <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                                {!! $module->description !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </div>

                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                            </div>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
    </div>

    @include('currency::livewire.includes.create-currency-modal')

@endsection

