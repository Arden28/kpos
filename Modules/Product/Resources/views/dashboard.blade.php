@extends('layouts.master')

@section('breadcrumb')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Tableau de bord') }}
                </h2>
            </div>
            <!-- Page title actions -->
            @can('create_pos_sales')
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">

                        <a href="{{ route('app.pos.index') }}" class="btn btn-primary d-none d-sm-inline-block {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}">
                            <i class="bi bi-plus"></i>
                            {{ __('Add an order') }}
                        </a>
                        {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#modal-report">
                            <i class="bi bi-plus"></i>
                            {{ __('Add an order') }}
                        </a> --}}

                        </div>
                    </div>
            @endcan
            </div>
        </div>
    </div>
@endsection

@section('content')
<!-- Page body -->
<div class="page-body">

  <div class="container-xl">
    <div class="row row-deck row-cards">

      <div class="col-12">
        <div class="row row-cards">
          <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-primary text-white avatar">
                        <i class="bi bi-cash"></i>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                       {{ __('Produits') }} :
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-green text-white avatar">
                        <i class="bi bi-cash"></i>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                        {{ __('Catégories') }} :
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

@endsection


