@extends('layouts.master')

@section('title', 'Gérez votre Inventaire ')

@section('breadcrumb')
<div class="page-header d-print-none">

    <div class="container-xl col-12" style="margin-bottom: 10px">
        <div class="card">
          <div class="card-header">
            <h2>{{ __('Gérez votre Invenraire') }}</h2>
          </div>
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


