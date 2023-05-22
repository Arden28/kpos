@extends('layouts.master')

@section('title', __('Tableau de bord'))

@section('styles')
    <style>
        .floating-element {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 100px;
            height: 40px;
            background-color: #ccc;
            border-radius: 5px;
            text-align: center;
            line-height: 40px;
        }
    </style>
@endsection
@section('breadcrumb')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          {{ __('Aperçu') }}
        </div>
        <h2 class="page-title">
          {{ __('Tableau de bord') }}
        </h2>
      </div>

      @if(module('sales'))
        @can('create_sales')
            <div class="btn-list">
                <a href="{{ route('sales.create') }}" class="btn btn-primary  d-sm-inline-block {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}">
                    <i class="bi bi-plus"></i>
                    {{ __('Ajouter une vente') }}
                </a>
            </div>
        @endcan
      @endif

    </div>
  </div>
</div>
    {{-- <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Tableau de bord') }}
                </h2>
            </div>
            <div class="col">
                <h2 class="page-title">
                    <p>salut</p>
                    <livewire:onboarding />
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

                        </div>
                    </div>
            @endcan
            </div>
        </div>
    </div> --}}
@endsection

@section('content')
<!-- Page body -->
<div class="page-body">

    <!-- Finances -->
    <div class="container-xl">

        <div class="row row-deck row-cards">
        @can('show_total_stats')
        <div class="col-12">
            <div class="row row-cards">

                <!-- Sale Units -->
                <livewire:reports::report.sale-unit />

                <!-- Purchases -->
                <livewire:reports::report.purchase />

                <!-- Revenue -->
                <livewire:reports::report.revenue />



                <!-- Benefit -->
                <livewire:reports::report.benefit />
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

    <!-- Inventory -->
    <div class="container-xl" style="margin-top: 15px;">


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
        const floatingElement = document.querySelector('.floating-element');
        const infoBulle = document.querySelector('.info-bulle');

        floatingElement.addEventListener('mouseover', () => {
            infoBulle.style.display = 'block';
        });

        floatingElement.addEventListener('mouseout', () => {
            infoBulle.style.display = 'none';
        });
    </script>
@endpush
