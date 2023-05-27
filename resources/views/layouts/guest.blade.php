<!Doctype html>
<html lang="{{ config('app.locale') }}" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title') | Koverae</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/demo.min.css')}}?1668287865" rel="stylesheet"/>

    @wireUiScripts
    <script src="//unpkg.com/alpinejs" defer></script>

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
        <div class="page-wrapper">

            <!-- Page body -->
            @yield('content')


        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
              <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="docs/" class="link-secondary">{{__('Documentation')}}</a></li>
                    <li class="list-inline-item"><a href="license.html" class="link-secondary">{{__('License')}}</a></li>
                  </ul>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                      Copyright &copy; 2022
                      <a href="." class="link-secondary">Koverae</a>.
                      {{ __('All rights reserved.') }}
                    </li>
                    <li class="list-inline-item">
                      <a href="changelog.html" class="link-secondary" rel="noopener">
                        v1.0.0-beta1
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </footer>
    </div>
  </div>

  <script src="{{ asset('assets/dist/js/tabler.min.js')}}?1668287865" defer></script>
  <script src="{{ asset('assets/dist/js/demo.min.js')}}?1668287865" defer></script>
    </body>
</html>
