@extends('layouts.master')

@section('title', 'Gérez votre Inventaire ')

{{-- @section('breadcrumb')
<div class="page-header d-print-none">

    <div class="container-xl col-12" style="margin-bottom: 10px">
        <div class="card">
          <div class="card-header">
            <h2>{{ __('Gérez votre Invenraire') }}</h2>
          </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
<!-- Page body -->
<div class="page-body">

  <div class="container-xl">

    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                <div>
                    <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="avatar placeholder-wave" style="background-image: url(./static/avatars/003m.jpg)"></span>
                    </div>
                    <div class="col">
                        <div class="card-title">
                            Hum
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-actions">
                    <div class="dropdown">
                    <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item">{{ __('Modifier') }}</a>
                        <a class="dropdown-item" >{{ __('Sessions') }}</a>
                        <a class="dropdown-item" >{{ __('Commandes') }}</a>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                    <div class="container col-md-12 text-center" style="margin-top: 12px">

                        <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-session-3">{{ __('Nouvelle Session') }}</a>

                    </div>
                    <hr>
                        <div class="container col-md-12">
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                <div>
                    <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="avatar placeholder-wave" style="background-image: url(./static/avatars/003m.jpg)"></span>
                    </div>
                    <div class="col">
                        <div class="card-title">
                            Hum
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-actions">
                    <div class="dropdown">
                    <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item">{{ __('Modifier') }}</a>
                        <a class="dropdown-item" >{{ __('Sessions') }}</a>
                        <a class="dropdown-item" >{{ __('Commandes') }}</a>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                    <div class="container col-md-12 text-center" style="margin-top: 12px">

                        <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-session-3">{{ __('Nouvelle Session') }}</a>

                    </div>
                    <hr>
                        <div class="container col-md-12">
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                <div>
                    <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="avatar placeholder-wave" style="background-image: url(./static/avatars/003m.jpg)"></span>
                    </div>
                    <div class="col">
                        <div class="card-title">
                            Hum
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-actions">
                    <div class="dropdown">
                    <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item">{{ __('Modifier') }}</a>
                        <a class="dropdown-item" >{{ __('Sessions') }}</a>
                        <a class="dropdown-item" >{{ __('Commandes') }}</a>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                    <div class="container col-md-12 text-center" style="margin-top: 12px">

                        <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-session-3">{{ __('Nouvelle Session') }}</a>

                    </div>
                    <hr>
                        <div class="container col-md-12">
                        </div>
                </div>
            </div>
        </div>

        @if(module('pos'))
        <div class="col-md-4" style="margin-top: 5px">
            <div class="card">
                <div class="card-header">
                <div>
                    <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="avatar placeholder-wave" style="background-image: url(./static/avatars/003m.jpg)"></span>
                    </div>
                    <div class="col">
                        <div class="card-title">
                            {{ __('Commande en Points de Ventes') }}
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-actions">
                    <div class="dropdown">
                    <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item">{{ __('Modifier') }}</a>
                        <a class="dropdown-item" >{{ __('Sessions') }}</a>
                        <a class="dropdown-item" >{{ __('Commandes') }}</a>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                    <div class="container col-md-12 text-center" style="margin-top: 12px">

                        <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-session-3">{{ __('15 commandes') }}</a>

                    </div>
                    <hr>
                        <div class="container col-md-12">
                        </div>
                </div>
            </div>
        </div>
        @endif

    </div> --}}


    <div class="row row-deck row-cards" style="margin-top: 10px">

        <div class="col-12">
          <div class="row row-cards">

            <div class="col-sm-6 col-lg-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-green text-white avatar">
                          <i class="bi bi-bounding-box"></i>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                          {{ __('Catégories de Produits') }} : {{ $categories->count() }}
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
                      <span class="bg-primary text-white avatar">
                          <i class="bi bi-boxes"></i>
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
            @if(module('pos'))
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-blue text-white avatar">
                            <i class="bi bi-shop-window"></i>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                            {{ __('Commandes de Point de Ventes') }} : {{ $categories->count() }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif

          </div>
        </div>


      </div>

  </div>

    {{-- <div class="container-xl" style="margin-top: 10px;">
        <div class="row row-cards">

            <!-- Suivis des commandes -->
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                    <h2>{{ __('Suivi des commandes') }}</h2>
                    </div>
                <div class="card-body">
                    <div id="order-tracking"></div>
                </div>
                </div>
            </div>


            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-header">
                    <h2>{{ __('Tendance des Familles') }}</h2>
                    </div>
                <div class="card-body">
                    <div id="chart-demo-pie"></div>
                </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="container-xl" style="margin-top: 10px;">
        <div class="row row-cards">

            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-header">
                    <h2>{{ __('Tendance des Produits') }}</h2>
                    </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        @foreach ($products as $product)

                            @forelse($product->getMedia('images') as $media)
                                <img src="{{ $media->getUrl() }}" alt="Product Image" class="text-white avatar">
                            @empty
                                <img src="{{ $product->getFirstMediaUrl('images') }}" alt="Product Image" class="text-white avatar">
                            @endforelse
                        </div>
                        <div class="col-8" style="margin-bottom: 5px;">
                        <div class="font-weight-medium">
                            {{ $product->product_name }}
                        </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>

            <!-- Mouvements des stocks -->
            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                    <h2>{{ __('Mouvements des stocks') }}</h2>
                    </div>
                <div class="card-body">
                    <div id="chart-line-stroke"></div>
                </div>
                </div>
            </div>

        </div>
    </div> --}}

</div>

@endsection

@push('page_scripts')

    <script>
        // chart-line-stroke
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-line-stroke'), {
                chart: {
                    type: "line",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: true,
                    },
                    animations: {
                        enabled: true
                    },
                },
                fill: {
                    opacity: 1,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "straight",
                },
                series: [{
                    name: "Entrée",
                    data: [8, 10, 11, 12, 20, 27, 30]
                },{
                    name: "Sortie",
                    data: [3, 16, 17, 19, 20, 30, 30]
                }
                // ,{
                //     name: "Sales",
                //     data: [7, 10, 11, 18, 18, 18, 24]
                // }
                ],
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
                    categories: ['2013', '2014', '2015', '2016', '2017', '2018', '2019'],
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                colors: [tabler.getColor("orange"), tabler.getColor("primary"), tabler.getColor("green")],
                legend: {
                    show: false,
                },
            })).render();
        });
        // @formatter:on
    </script>

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
                    toolbar: {
                        show: true,
                    },
      			animations: {
      				enabled: true
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
            window.ApexCharts && (new ApexCharts(document.getElementById('order-tracking'), {
                chart: {
                    type: "line",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: true,
                    },
                    animations: {
                        enabled: true
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

    {{-- <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('order-tracking'), {
                chart: {
                    type: "line",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: true,
                    },
                    animations: {
                        enabled: true
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
    </script> --}}

@endpush

