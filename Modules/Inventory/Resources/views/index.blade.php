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
                       {{ __('Produits') }} : {{ $products->count() }}
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
                        {{ __('Catégories') }} : {{ $categories->count() }}
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

  {{-- <div class="container-xl" style="margin-top: 10px;">
    <div class="row row-cards">

        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <h2>{{ __('Suivi des stocks') }}</h2>
                </div>
              <div class="card-body">
                <div id="chart-completion-tasks-2"></div>
              </div>
            </div>
        </div>
    </div>
  </div> --}}

</div>

@endsection

@push('page_scripts')

    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
      		chart: {
      			type: "donut",
      			fontFamily: 'inherit',
      			height: 240,
      			sparkline: {
      				enabled: true
      			},
      			animations: {
      				enabled: false
      			},
      		},
      		fill: {
      			opacity: 1,
      		},
      		series: [44, 55, 12, 2],
      		labels: ["Direct", "Affilliate", "E-mail", "Other"],
      		tooltip: {
      			theme: 'dark'
      		},
      		grid: {
      			strokeDashArray: 4,
      		},
      		colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8), tabler.getColor("primary", 0.6), tabler.getColor("gray-300")],
      		legend: {
      			show: true,
      			position: 'bottom',
      			offsetY: 12,
      			markers: {
      				width: 10,
      				height: 10,
      				radius: 100,
      			},
      			itemMargin: {
      				horizontal: 8,
      				vertical: 8
      			},
      		},
      		tooltip: {
      			fillSeriesColor: false
      		},
      	})).render();
      });
      // @formatter:on
    </script>

    {{-- Stock sense --}}
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-2'), {
                chart: {
                    type: "line",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                fill: {
                    opacity: 1,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Quantité",
                    data: [45, 150, 230, 54, 22, 345, 589, 599]
                }],
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                    '2023-04-13', '2023-04-15', '2023-04-16', '2023-04-17', '2023-04-18', '2023-04-19', '2023-04-20'
                ],
                colors: [tabler.getColor("primary")],
                legend: {
                    show: true,
                },
            })).render();
        });
        // @formatter:on
    </script>

@endpush

