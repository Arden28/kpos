@extends('layouts.master')

@section('title', trans('master.navbar-menu.modules.hr.dash.page_title'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ trans('master.navbar-menu.modules.hr.dash.page_title') }}
        </h2>
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
                       Employés :
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
                        Postes :
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      @endcan

      @can('show_monthly_cashflow')
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-header">
                      Fréquence de commande
                  </div>
                  <div class="card-body">
                      <canvas id="paymentChart"></canvas>
                  </div>
              </div>
          </div>
      @endcan


    </div>

  </div>
@endsection
