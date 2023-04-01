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
                            <h3 class="mb-0">{{ __('Société') }}</h3>
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

                {{-- <div class="col-lg-12">
                    @if (session()->has('settings_smtp_message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <span>{{ session('settings_smtp_message') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Mail Settings</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.smtp.update') }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_mailer">MAIL_MAILER <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mail_mailer" value="{{ env('MAIL_MAILER') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_host">MAIL_HOST <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mail_host" value="{{ env('MAIL_HOST') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_port">MAIL_PORT <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="mail_port" value="{{ env('MAIL_PORT') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_mailer">MAIL_MAILER</label>
                                            <input type="text" class="form-control" name="mail_mailer" value="{{ env('MAIL_MAILER') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_username">MAIL_USERNAME</label>
                                            <input type="text" class="form-control" name="mail_username" value="{{ env('MAIL_USERNAME') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_password">MAIL_PASSWORD</label>
                                            <input type="password" class="form-control" name="mail_password" value="{{ env('MAIL_PASSWORD') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="mail_encryption">MAIL_ENCRYPTION</label>
                                            <input type="text" class="form-control" name="mail_encryption" value="{{ env('MAIL_ENCRYPTION') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="mail_from_address">MAIL_FROM_ADDRESS</label>
                                            <input type="email" class="form-control" name="mail_from_address" value="{{ env('MAIL_FROM_ADDRESS') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="mail_from_name">MAIL_FROM_NAME <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mail_from_name" value="{{ env('MAIL_FROM_NAME') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">{{ __('POS Settings') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.smtp.update') }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_mailer"> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mail_mailer" value="{{ env('MAIL_MAILER') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_host">MAIL_HOST <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mail_host" value="{{ env('MAIL_HOST') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_port">MAIL_PORT <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="mail_port" value="{{ env('MAIL_PORT') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_mailer">MAIL_MAILER</label>
                                            <input type="text" class="form-control" name="mail_mailer" value="{{ env('MAIL_MAILER') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_username">MAIL_USERNAME</label>
                                            <input type="text" class="form-control" name="mail_username" value="{{ env('MAIL_USERNAME') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="mail_password">MAIL_PASSWORD</label>
                                            <input type="password" class="form-control" name="mail_password" value="{{ env('MAIL_PASSWORD') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="mail_encryption">MAIL_ENCRYPTION</label>
                                            <input type="text" class="form-control" name="mail_encryption" value="{{ env('MAIL_ENCRYPTION') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="mail_from_address">MAIL_FROM_ADDRESS</label>
                                            <input type="email" class="form-control" name="mail_from_address" value="{{ env('MAIL_FROM_ADDRESS') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="mail_from_name">MAIL_FROM_NAME <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mail_from_name" value="{{ env('MAIL_FROM_NAME') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i> Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div> --}}


            </div>
        </div>
    </div>

    @include('currency::livewire.includes.create-currency-modal')

@endsection

