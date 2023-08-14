<!Doctype html>
<html lang="{{ config('app.locale') }}" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title') | Koverae </title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css')}}?1668287865" rel="stylesheet"/>
    <!-- CoreUI CSS -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous"> --}}


    <wireui:scripts />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    @include('includes.main-css')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
  <body >
    <script src="{{ asset('assets/dist/js/demo-theme.min.js')}}?1668287865"></script>
    <div class="page">
      <!-- Navbar -->
      @include('layouts.navbar')

      <!-- Navbar -->
        @if(request()->routeIs('dashboard'))

            @include('layouts.navbar-menu')

        <!-- HR -->
        @elseif(request()->routeIs('users.*') || request()->routeIs('roles.*') || request()->routeIs('hr.*') )

            @include('user::layouts.navbar-menu')

        <!-- Inventory -->
        @elseif(request()->routeIs('inventory.*') || request()->routeIs('products.*') || request()->routeIs('product-units.*') || request()->routeIs('product-categories.*') || request()->routeIs('barcode.print') || request()->routeIs('adjustments.*') || request()->routeIs('purchases.*') || request()->routeIs('purchase-payments.*') || request()->routeIs('purchase-returns*') || request()->routeIs('purchase-return-payments*') )

            @include('inventory::layouts.navbar-menu')

        <!-- CRM -->
        @elseif(request()->routeIs('customers.*') || request()->routeIs('suppliers.*') || request()->routeIs('crm.*'))

            @include('people::layouts.navbar-menu')

        <!-- POS -->
        @elseif(request()->routeIs('app.pos.*'))

            @include('pos::layouts.navbar-menu')

        <!-- Setting -->
        @elseif(request()->routeIs('settings.*') || request()->routeIs('currencies.*') || request()->routeIs('profile.*'))

            @include('setting::layouts.navbar-menu')

        <!-- Finance -->
        @elseif(request()->routeIs('finance.*') || request()->routeIs('account.*') || request()->routeIs('book.*') || request()->routeIs('expense-categories.*') || request()->routeIs('expenses.*') || request()->routeIs('*-report.*') )

            @include('financial::layouts.navbar-menu')

        <!-- Sales -->
        @elseif(request()->routeIs('sales.*') || request()->routeIs('sale-returns.*') || request()->routeIs('quotations.*'))

            @include('sale::layouts.navbar-menu')

        @elseif(request()->routeIs('elearning.*'))

            @include('elearning::layouts.navbar-menu')

        @else

            @include('layouts.navbar-menu')

        @endif

      <div class="page-wrapper">

        <!-- Page header -->
        @yield('breadcrumb')

        <!-- Page body -->
        @yield('content')

        {{-- Footer --}}
        @include('layouts.footer')
      </div>
    </div>


    @include('includes.main-js')

  </body>
</html>
