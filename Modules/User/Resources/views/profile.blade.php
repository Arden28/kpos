@extends('layouts.master')

@section('title', __('Votre Profile'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Profile') }}
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
                    <h3>Salut, <span class="text-primary">{{ auth()->user()->name }}</span></h3>
                    <p class="font-italic">Modifiez vos informations ici. </p>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <label for="image">Image de Profil <span class="text-danger">*</span></label>
                                    <img style="width: 100px;height: 100px;" class="d-block mx-auto img-thumbnail img-fluid rounded-circle mb-2" src="{{ auth()->user()->getFirstMediaUrl('avatars') }}" alt="Profile Image">
                                    <input id="image" type="file" name="image" data-max-file-size="500KB">
                                </div>

                                <div class="form-group">
                                    <label for="name">Nom <span class="text-danger">*</span></label>
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
                                    <label for="tel">Téléphone <span class="text-danger">*</span></label>
                                    <input class="form-control" type="phone" name="phone" required value="{{ auth()->user()->phone }}">
                                    @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Mettre à Jour <i class="bi bi-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('profile.update.password') }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="current_password">Mot de passe actuel <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="current_password" required>
                                    @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Nouveau mot de passe <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" required>
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmez le mot de passe<span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Modifier <i class="bi bi-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('page_scripts')
    @include('includes.filepond-js')
@endpush


