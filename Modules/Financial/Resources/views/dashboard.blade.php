@extends('layouts.master')

@section('title', 'Finance & Facturation')

@section('breadcrumb')
<div class="page-header d-print-none">

    <div class="container-xl col-12" style="margin-bottom: 10px">
        <div class="card">
          <div class="card-header">
            <h2>{{ __('Gérez vos Finances') }}</h2>
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
                     {{ trans('dashboards.main.revenue') }} : {{ format_currency($revenue) }}
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
                      {{ format_currency($sale_returns) }} {{ trans('dashboards.main.sale_return') }}
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
                      {{ format_currency($purchase_returns) }} {{ trans('dashboards.main.purchase_return') }}
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
                      {{ format_currency($profit) }} {{ trans('dashboards.main.profit') }}
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
                    {{ trans('dashboards.main.cashflow') }}
                </div>
                <div class="card-body">
                    <canvas id="paymentChart"></canvas>
                </div>
            </div>
        </div>
    @endcan


  </div>

</div>

<div class="container-xl" style="margin-top: 15px">

    @can('show_weekly_sales_purchases|show_month_overview')
    <div class="row row-cards">
        @can('show_weekly_sales_purchases')
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header">
                    {{ trans('dashboards.main.cashflow') }}
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
                    {{ trans('dashboards.main.cashflow') }} {{ now()->format('F, Y') }}
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
@endpush
