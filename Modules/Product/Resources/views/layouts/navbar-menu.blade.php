
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">

            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('dashboard') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="bi bi-arrow-left" style="width: 28px; height:28px; "></i>
                </span>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('inventory.index') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('inventory.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                    {{ trans('master.navbar-menu.modules.inventory.dashboard') }}
                </span>
              </a>
            </li>

            @can('access_products')
            <li class="nav-item dropdown {{ request()->routeIs('product-categories*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-box" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ trans('master.navbar-menu.modules.inventory.categories.title') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">
                    <a class="dropdown-item  {{ request()->routeIs('*product-categories.index') ? 'active' : '' }}" href="{{ route('product-categories.index') }}">

                      {{ trans('master.navbar-menu.modules.inventory.categories.all') }}
                    </a>

                  </div>

                </div>
              </div>
            </li>
            @endcan

            @can('access_products')
            <li class="nav-item dropdown {{ request()->routeIs('products*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-box" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ trans('master.navbar-menu.modules.inventory.products.title') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">
                    <a class="dropdown-item  {{ request()->routeIs('*products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">

                      {{ trans('master.navbar-menu.modules.inventory.products.all') }}
                    </a>

                  </div>

                  {{-- Right --}}
                  <div class="dropdown-menu-column">

                    <a class="dropdown-item {{ request()->routeIs('*products.create') ? 'active' : '' }}" href="{{ route('products.create') }}">

                        {{ trans('master.navbar-menu.modules.inventory.products.add') }}
                    </a>

                  </div>
                </div>
              </div>
            </li>
            @endcan

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('barcode.print') ? 'active' : '' }}" href="{{ route('barcode.print') }}">
                    <i class="bi bi-upc-scan" style="width: 24px; height: 24px;"></i>
                  </span>
                  <span class="nav-link-title">
                    {{ trans('master.navbar-menu.modules.inventory.barcode') }}
                  </span>
                </a>
            </li>

            @can('access_adjustments')
            <li class="nav-item dropdown {{ request()->routeIs('adjustments*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-box" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ trans('master.navbar-menu.modules.inventory.ajustments.title') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">
                    <a class="dropdown-item  {{ request()->routeIs('*adjustments.index') ? 'active' : '' }}" href="{{ route('adjustments.index') }}">

                      {{ trans('master.navbar-menu.modules.inventory.ajustments.all') }}
                    </a>

                  </div>

                  {{-- Right --}}
                  <div class="dropdown-menu-column">

                    <a class="dropdown-item {{ request()->routeIs('*adjustments.create') ? 'active' : '' }}" href="{{ route('adjustments.create') }}">

                        {{ trans('master.navbar-menu.modules.inventory.ajustments.add') }}
                    </a>

                  </div>
                </div>
              </div>
            </li>
            @endcan

            <li class="nav-item">
              <a class="nav-link" href="#navbar-help">
                <i class="bi bi-life-preserver" style="width: 24px; height: 24px;"></i>
                </span>
                <span class="nav-link-title">
                  {{ trans('master.navbar-menu.modules.inventory.documentation') }}
                </span>
              </a>
            </li>

          </ul>
          {{-- Search --}}
          {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="./" method="get" autocomplete="off" novalidate>
              <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                </span>
                <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
              </div>
            </form>
          </div> --}}

        </div>
      </div>
    </div>
  </div>
