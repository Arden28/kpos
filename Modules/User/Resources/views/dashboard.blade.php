@extends('layouts.master')

@section('title', __('Ressources Humaines'))

@section('breadcrumb')
<div class="page-header d-print-none">
    <div class="container-xl col-12" style="margin-bottom: 10px">
        <div class="card">
          <div class="card-header">
            <h2>{{ __('Gérez vos Ressources Humaines') }}</h2>
          </div>
        </div>
    </div>
</div>
@endsection

@section('content')
  <div class="container-xl">
    <div class="row row-deck row-cards">
      @can('show_total_stats')
      <div class="col-12">
        <div class="row row-cards">
          <div class="col-sm-12 col-lg-6">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-primary text-white avatar">
                        <i class="bi bi-people"></i>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                       {{ __('Employés') }} :
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <div class="card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-green text-white avatar">
                        <i class="bi bi-people"></i>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                        {{ __('Postes') }} :
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      @endcan


    </div>

  </div>
@endsection
