@extends('layouts.master')

@section('title', __('Ajouter un employé'))

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
            {{ __('Ajouter un employé') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Ajouter un employé') }} <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Nom(s) & Prénom(s)') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tel">{{ __('Téléphone') }} <span class="text-danger">*</span></label>
                                            <x-tel-input
                                                id="phone"
                                                name="phone"
                                                class="form-control"
                                            />
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">{{ __('Mot de passe') }} <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">{{ __('Confirmer le mot de passe') }} <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="role">{{ __('Rôle') }} <span class="text-danger">*</span></label>
                                            <select class="form-control" name="role" id="role" required>
                                                <option value="" selected disabled>{{ __('Selectionner un Rôle') }}</option>
                                                @foreach(\Spatie\Permission\Models\Role::where('name', '!=', 'Super Admin')->get() as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="is_active">{{ __('Status') }} <span class="text-danger">*</span></label>
                                            <select class="form-control" name="is_active" id="is_active" required>
                                                <option value="" selected disabled>{{ __('Selectionner un Statut') }}</option>
                                                <option value="1">{{ __('Actif') }}</option>
                                                <option value="2">{{ __('Inactif') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">{{ __('Photo de Profil') }} <span class="text-danger">*</span></label>
                                    <input id="image" type="file" name="image" data-max-file-size="500KB">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@section('third_party_scripts')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endsection

@push('page_scripts')
    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType
        );
        const fileElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create(fileElement, {
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        });
        FilePond.setOptions({
            server: {
                url: "{{ route('filepond.upload') }}",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }
        });
    </script>
@endpush


