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
            {{-- <div class="col">
                <h2 class="page-title">
                    <livewire:onboarding />
                </h2>
            </div> --}}
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
      @can('show_total_stats')
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
                       {{ __('Revenue') }} : {{ format_currency($revenue) }}
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
                        {{ format_currency($sale_returns) }} {{ __('Sales Retrun') }}
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
                    <span class="bg-twitter text-white avatar">
                        <i class="bi bi-cash"></i>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                        {{ format_currency($purchase_returns) }} {{ __('Commandes Retournées') }}
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
                    <span class="bg-facebook text-white avatar">
                        <i class="bi bi-cash"></i>
                    </span>
                  </div>
                  <div class="col">
                    <div class="font-weight-medium">
                        {{ format_currency($profit) }} {{ __('Bénéfice') }}
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
                      {{ __("Flux de trésorie mensuelle (Paiements envoyés & reçus)") }}
                  </div>
                  <div class="card-body">
                      <canvas id="paymentChart"></canvas>
                  </div>
              </div>
          </div>
      @endcan


    </div>

  </div>

  <!-- Analytics -->

        <div class="container-xl">

            @can('show_weekly_sales_purchases')
            <div class="row row-cards">
                @can('show_weekly_sales_purchases')
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header">
                            {{ __('Sales & Purchases of Last 7 Days') }}
                        </div>
                        <div class="card-body">
                            <canvas id="salesPurchasesChart"></canvas>
                        </div>
                    </div>
                </div>
                @endcan
                @can('show_month_overview')
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header">
                            {{ __('Overview of') }} {{ now()->format('F, Y') }}
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="chart-container" style="position: relative; height:auto; width:280px">
                                <canvas id="currentMonthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
            @endcan

        </div>
</div>

@endsection


@section('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
            integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@push('page_scripts')
    <script src="{{ mix('js/chart-config.js') }}"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            allowTouchMove: false,
            noSwipingClass: 'no-swipe',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>

    </script>
@endpush
