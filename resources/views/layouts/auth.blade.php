<!Doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('page_title') | Koverae.com</title>
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css')}}?1668287865" rel="stylesheet"/>
    @livewireStyles
    <wireui:scripts />
    <script src="https://unpkg.com/alpinejs" defer></script>
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous"> --}}
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
  </head>
  <body  class=" d-flex flex-column bg-white">
    <script src="{{ asset('dist/js/demo-theme.min.js')}}?1668287865"></script>

    @yield('content')

    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js')}}?1668287865" defer></script>
    <script src="{{ asset('dist/js/demo.min.js')}}?1668287865" defer></script>
    @yield('scripts')
    @livewireScripts
  </body>
</html>
