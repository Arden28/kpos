@extends('layouts.master')

@section('title', __('Catégories de dépenses - Finance & Facturation'))

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Catégories de dépenses') }}
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
                    <div class="card">
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryCreateModal">
                                {{ __('Ajouter une Catégorie') }} <i class="bi bi-plus"></i>
                            </button>

                            <hr>

                            <div class="table-responsive">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoryCreateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryCreateModalLabel">{{ __('Ajouter une Catégorie dépense') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('expense-categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">{{ __('Nom de la Catégorie') }} <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="category_name" required>
                        </div>

                        <div class="form-group">
                            <label for="category_description">{{ __('Description') }}</label>
                            <textarea class="form-control" name="category_description" id="category_description" rows="5"></textarea>
                        </div>

                        @include('financial::includes.accounts.choice')

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }} <i class="bi bi-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}


    <script>
        const accountForm = document.getElementById('account-form');
        const showAccountFormButton = document.getElementById('show-account-form');
        let isAccountFormVisible = false;
        showAccountFormButton.addEventListener('click', function() {
            isAccountFormVisible = !isAccountFormVisible;
            accountForm.style.display = isAccountFormVisible ? 'block' : 'none';
            showAccountFormButton.innerHTML = isAccountFormVisible ? 'Cacher' : 'Connecter un Compte';
        });
    </script>

@endpush
