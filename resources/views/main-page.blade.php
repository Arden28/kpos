<!Doctype html>
<html lang="{{ config('app.locale') }}" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Acceuil | Koverae </title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/demo.min.css')}}?1668287865" rel="stylesheet"/>
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      @media (max-width: 500px) {
            .custom-col {
                flex: 0 0 50%; /* Afficher deux colonnes par ligne */
                max-width: 50%;
            }
        }
        .inspiring-div {
            position: relative;
            background-color: #f5f5f5; /*Couleur de fond */
            padding: 20px;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/images/background/background-5.jpg');
            background-repeat: repeat-x; /* Répéter l'image horizontalement */
            background-position: bottom; /*Positionner l'image en bas*/
            background-size: auto; /*Ajuster la taille de l'image à 100% de la hauteur  */
        }

        .wave-shape {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/images/background/backgroung.jpg');
            background-repeat: repeat-x; /* Répéter l'image horizontalement */
            background-position: bottom; /* Positionner l'image en bas */
            background-size: auto 100%; /* Ajuster la taille de l'image à 100% de la hauteur */
        }

        .custom-image {
            width: 80px;
            height: 80px;
            transition: transform 0.3s ease;
        }

        .custom-image:hover {
            transform: translateY(-5px) perspective(100px) rotateX(5deg);
        }

        .installed {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* .row-app{
            padding-left: 150px;
            padding-right: 150px;
        } */
    </style>
  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js?1668287865"></script>
    <div class="page inspiring-div ">
        {{-- <svg class="wave-shape" xmlns="http://www.w3.org/2000/svg" viewBox="10 0 1440 320">
          <path fill="#ffffff" fill-opacity="1" d="M0,256L120,229.3C240,203,480,149,720,138.7C960,128,1200,160,1320,176L1440,192L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
        </svg> --}}
      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar navbar-overlap d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('main') }}">
                <img src="{{ asset('assets/images/logo/logo-black-gd.png') }}" alt="Koverae POS" class="navbar-brand-image">
              {{-- <img src="./dist/img/logo/logo.svg" width="320" height="120"  alt="POS" class="navbar-brand-image"> --}}
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">

            <div class="nav-item d-none d-md-flex me-3">
                <div class="btn-list">

                    @if(!subscribed(Auth::user()->team->id))
                            <a type="button" href="{{ route('register.pro') }}" class="btn" >
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" /></svg>
                                {{ __('Passer à la version pro') }}
                            </a>
                    @elseif(subscribed(Auth::user()->team->id)->isOnTrial())
                        <livewire:subby.remain-date />
                    @endif

                </div>
            </div>
            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="{{ __('Mode Sombre') }}" data-bs-toggle="tooltip"
		        data-bs-placement="bottom">
                <i class="bi bi-moon" style="font-size: 15px;"></i>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="{{ __('Mode Clair') }}" data-bs-toggle="tooltip"
		        data-bs-placement="bottom">
                <i class="bi bi-brightness-high" style="font-size: 15px;"></i>
              </a>
              {{-- Translate --}}
              <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">

                  <i class="bi bi-translate" style="font-size: 15px;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">
                        {{ __('Langues') }} : {{ Config::get('languages')[App::getLocale()] }}
                      </h5>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">

                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="{{ route('lang.switch', $lang) }}" class="text-body d-block">
                                        {{$language}}
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="" class="list-group-item-actions">
                                        <i class="bi bi-app-indicator mr-2 text-danger"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>
              {{-- Notifications --}}
                @php
                    $low_quantity_products = \Modules\Product\Entities\Product::select('id', 'product_quantity', 'product_stock_alert', 'product_code', 'product_name')->whereColumn('product_quantity', '<=', 'product_stock_alert')
                    ->company(Auth::user()->currentCompany->id)->get();
                    $notifications = $low_quantity_products->count();
                @endphp
              <div class="nav-item dropdown d-none d-md-flex me-3">
                @can('show_notifications')
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">

                  <i class="bi bi-bell" style="font-size: 15px;"></i>

                  @if($notifications > 0)
                    <span class="badge bg-red">
                        {{ $notifications }}
                    </span>
                  @endif
                </a>
                @endcan
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        {{ $low_quantity_products->count() }} {{ __('Notifications') }}
                      </h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">

                        @forelse($low_quantity_products as $product)
                        <div class="list-group-item">
                            <div class="row align-items-center">
                            <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                            <div class="col text-truncate text-muted text-truncate mt-n1">
                                <a href="{{ route('products.show', $product->id) }}" class="text-body">
                                    {{ __('Le Produit') }}: "{{ $product->product_name }}" {{ __("est en stock d'alerte !") }}
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="list-group-item-actions">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <i class="bi bi-hash mr-1 text-primary"></i>
                                </a>
                            </div>
                            </div>
                        </div>
                        @empty
                            <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <p class="col text-truncate">
                                        {{ __('Aucune Notification disponible') }}
                                    </p>
                                </div>
                            </div>
                            </div>
                        @endforelse
                    </div>
                  </div>
                </div>
              </div>

            </div>
            {{-- Companies --}}

            @php
                $companies = Auth::user()->allCompanies();
            @endphp
              @can('access_companies')
              <div class="nav-item dropdown d-none d-md-flex me-3">
                  <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">

                  <i class="bi bi-building" style="font-size: 15px;"></i>
                      @if($companies->count() > 1)
                          <span class="badge bg-red">
                              {{ $companies->count() }}
                          </span>
                      @endif
                  </a>
                  <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                      <div class="card-header">
                      <h3 class="card-title">
                          @if($companies->count() > 1)
                          {{ __('Mes Entreprises') }}
                          @else
                          {{ __('Mon Entreprise') }}
                          @endif

                      </h3>
                      </div>
                      <div class="list-group list-group-flush list-group-hoverable">
                          @forelse ($companies as $company)
                              <div class="list-group-item">
                                  <div class="row align-items-center">
                                      <div class="col-auto">
                                      @if(Auth::user()->currentCompany->id == $company->id)
                                          <span class="status-dot status-dot-animated bg-green d-block"></span>
                                      @endif

                                      </div>
                                      <div class="col text-truncate text-muted text-truncate mt-n1">
                                          <a class="text-body d-block">
                                            <span class="avatar avatar-sm" style="background-image: url({{ Auth::user()->currentCompany->getFirstMediaUrl('avatars') }})"></span>
                                              {{ $company->name }}
                                          </a>
                                      </div>
                                      <div class="col-auto">
                                          {{-- When the Company Id == the current connected Company --}}
                                          @if(Auth::user()->currentCompany->id == $company->id)
                                              <a href="{{ route('settings.index') }}" class="list-group-item-actions">
                                                  <i class="bi bi-eye mr-1 text-primary"></i>
                                              </a>
                                          @else
                                              <a class="list-group-item-actions">
                                                  <i class="bi bi-broadcast-pin mr-1 text-primary"></i>
                                              </a>
                                          @endif
                                      </div>
                                  </div>
                              </div>

                          @empty
                              <div class="list-group-item">
                                  <div class="row align-items-center">
                                      <div class="col-auto">
                                          <p class="col text-truncate">
                                              {{ __('Vous n\'avez aucune entreprise.') }}
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          @endforelse

                      </div>
                  </div>
                  </div>
              </div>
              @endcan

            {{-- User --}}
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0 placeholder-glow" data-bs-toggle="dropdown" aria-label="Open user menu">
                {{-- <img class="avatar avatar-sm"  src="{{ auth()->user()->getFirstMediaUrl('avatars') }}" alt="Profile Image"> --}}
                <span class="avatar avatar-sm" style="background-image: url({{ auth()->user()->getFirstMediaUrl('avatars') }})"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>{{ auth()->user()->name }}</div>
                  <div class="mt-1 small text-muted">
                    <span class="font-italic">{{ __('En Ligne') }} <i class="bi bi-circle-fill text-success" style="font-size: 11px;"></i></span>
                  </div>

                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    {{ __('Mon Profile') }}
                </a>
                <div class="dropdown-divider"></div>
                {{--
                <a href="{{ route('subby.index') }}" class="dropdown-item">
                    {{ __('Mes abonnements') }}
                </a>
                <div class="dropdown-divider"></div> --}}

                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                    {{ __('Me déconnecter') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

              </div>
            </div>
          </div>
          {{-- <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">


              </ul>
            </div>
          </div> --}}
        </div>
      </header>
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none text-white">
          <div class="container-xl">
            {{-- <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Overview
                </div>
                <h2 class="page-title">
                  Navbar overlap layout
                </h2>
              </div>
            </div> --}}
          </div>
        </div>

        <!-- Page body -->

        <div class="page-body">
            <div class="container-xl">
              <div class="row row-app justify-content-center d-flex"> <!-- Ajout de la classe "d-flex justify-content-center" -->
                @foreach ($modules as $module)
                  @if (module($module->slug))
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 custom-col installed">
                      <div class="card-body text-center">
                        <div class="container">
                          @if ($module->slug == 'finance')
                            <a href="{{ route('finance.index') }}">
                          @elseif ($module->slug == 'inventory')
                            <a href="{{ route('inventory.index') }}">
                          @elseif ($module->slug == 'hr')
                            <a href="{{ route('users.index') }}">
                          @elseif ($module->slug == 'sales')
                            <a href="{{ route('sales.index') }}">
                          @elseif ($module->slug == 'crm')
                            <a href="{{ route('crm.index') }}">
                          @elseif ($module->slug == 'pos')
                            <a href="{{ route('app.pos.dashboard') }}">
                          @endif
                          <img class="custom-image" src="{{ asset('assets/images/apps/'.$module->slug.'.png') }}" alt="">
                          </a>
                          <legend style="font-weight: bold; font-size: 16px; color: #808080; cursor: pointer;">
                            {{ $module->name }}
                          </legend>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 custom-col">
                  <div class="card-body text-center">
                    <div class="container d-flex justify-content-center">
                      <a href="{{ route('settings.index') }}">
                        <img class="custom-image" src="{{ asset('assets/images/apps/settings.jpeg') }}" alt="">
                      </a>
                    </div>
                    <legend class="pointer" style="font-weight: bold; font-size: 14px; color: #808080">
                      {{ __('Paramètres') }}
                    </legend>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 custom-col">
                  <div class="card-body text-center">
                    <div class="container d-flex justify-content-center">
                      <a href="#">
                        <img class="custom-image" src="{{ asset('assets/images/apps/helpdesk.png') }}" alt="">
                      </a>
                    </div>
                    <legend class="pointer" style="font-weight: bold; font-size: 14px; color: #808080">
                      {{ __('Centre d\'aide') }}
                    </legend>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
    <!-- Libs JS -->

    @include('includes.main-js')
  </body>
</html>
