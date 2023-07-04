@extends('layouts.master')

@section('title', __('Mon Profil'))

@section('third_party_stylesheets')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet"/>
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Mon Profil') }}
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
                <div class="col-12">
                    @include('utils.alerts')
                    <h3>{{ __('Salut') }}, <span class="text-primary">{{ trim(strrchr(auth()->user()->name, ' ')) }}</span></h3>
                    <p class="font-italic">{{ __('Gérez votre profil et vos identifiant ici ...') }}</p>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">{{ __('Profil') }}</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <label for="image">{{ __('Photo de profil') }} <span class="text-danger">*</span></label>
                                    <img style="width: 100px;height: 100px;" class="d-block mx-auto img-thumbnail img-fluid rounded-circle mb-2" src="{{ auth()->user()->getFirstMediaUrl('avatars') }}" alt="Profile Image">
                                    <input id="image" type="file" name="image" data-max-file-size="500KB">
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="name">{{ __('Nom(s) & Prénom(s)') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" required value="{{ auth()->user()->name }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" required value="{{ auth()->user()->email }}">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tel">Phone <span class="text-danger">*</span></label>
                                    <input class="form-control" type="phone" name="phone" required value="{{ auth()->user()->phone }}">
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }} <i class="bi bi-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">{{ __('Modifier votre mot de passe') }}</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update.password') }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="current_password">{{ __('Mot de passe actuel') }} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="current_password" required>
                                    @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Nouveau mot de passe') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" required>
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('Confirmez le mot de passe') }} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }} <i class="bi bi-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" style="margin-top: 10px;">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">{{ __('Votre Abonnement') }}</h2>
                        </div>

                        @if(subscribed(Auth::user()->team->id))
                            @php
                                $today = today();
                                $startAt = \Carbon\Carbon::parse($subscription->starts_at);
                                $endAt = \Carbon\Carbon::parse($subscription->ends_at);

                                $totalDays = $startAt->diffInDays($endAt);
                                $remain = $today->diffInDays($endAt);
                            @endphp
                            <div class="card-body">
                                <div class="container-fluid">
                                    <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Abonnement') }} </th>
                                            <th>{{ __('Durée') }}</th>
                                            <th>{{ "Jours restants" }}</th>
                                        </tr>
                                    </thead>
                                        <tbody>

                                            <tr>
                                            <td><b>{{ $subscription->name }}</b></td>
                                            <td>{{ $totalDays}} {{ __('Jours') }}</td>
                                            <td>{{ $remain }} {{ __('Jours') }}</td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="container-fluid">
                                    <p>{{ __("Vous n'avez aucun abonnement actif.") }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@push('page_scripts')
    @include('includes.filepond-js')
@endpush


