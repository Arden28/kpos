<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title> @yield('page_title') | Koverae.com</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/demo.min.css')}}?1668287865" rel="stylesheet"/>

    {{-- <wireui:scripts /> --}}
    {{-- <script src="https://unpkg.com/alpinejs" defer></script> --}}

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    @include('includes.main-css1')

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  </head>
  <body >
    <script src="{{ asset('assets/dist/js/demo-theme.min.js')}}?1668287865"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('assets/images/logo/logo-1.png') }}" alt="Koverae" class="navbar-brand-image">
            </a>
          </h1>

          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">

                <li class="nav-item {{ request()->routeIs('app.pos.index') ? 'd-none' : '' }}">
                    <a class="nav-link" href="{{ route('app.pos.index') }}" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                          <i class="bi bi-arrow-left" style="width: 28px; height:28px; "></i>
                      </span>
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('app.pos.order') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <i class="bi bi-cash"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Cash Entrant/Sortant') }}
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('app.pos.order') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <i class="bi bi-receipt-cutoff" style="width: 24px; height: 24px;"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Commandes') }}
                    </span>
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </header>
      <div class="page-wrapper">
        <!-- Page header -->
        @yield('breadcrumb')

        <!-- Page body -->
        <div class="page-body">
            @yield('content')
        </div>

        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="#" class="link-secondary">Koverae</a>.
                    Tous droits réservés.
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta16
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

	{{-- <script>
		function toggleFullscreen() {
			var element = document.getElementById("fullscreen-section");
			element.classList.toggle("active");
		}
	</script> --}}

    @include('includes.main-js')

    </body>
</html>
