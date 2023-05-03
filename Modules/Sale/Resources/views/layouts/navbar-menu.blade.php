
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

            {{-- <li class="nav-item {{ request()->routeIs('users*') ? 'active' : '' }}"> --}}
            <li class="nav-item">
              <a class="btn {{ request()->routeIs('finance*') ? 'active' : '' }}" style="margin-right: 5px;">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <i class="bi bi-bar-chart-line-fill" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                    {{ __('Ventes') }}
                </span>
              </a>
            </li>

            @can('access_reports')
            <li class="nav-item dropdown"  data-turbolinks="false" >
              <a class="btn {{ request()->routeIs('quotations.*') || request()->routeIs('sales.*') ? 'active' : '' }}" style="margin-right: 5px;" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-clipboard-data" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ __('Commandes') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ request()->routeIs('quotations.*') ? 'active' : '' }}" href="{{ route('quotations.index') }}">
                        <i class="bi bi-clipboard-data" style="width: 24px; height:24px"></i>
                      {{ __('Devis') }}
                    </a>

                    <a class="dropdown-item {{ request()->routeIs('sales.index') ? 'active' : '' }}" href="{{ route('sales.index') }}">
                        <i class="bi bi-bar-chart-line-fill" style="width: 24px; height:24px"></i>
                      {{ __('Ventes') }}
                    </a>

                    <a class="dropdown-item {{ request()->routeIs('sale-returns.*') ? 'active' : '' }}" href="{{ route('sale-returns.index') }}">
                        <i class="bi bi-graph-down-arrow" style="width: 24px; height:24px"></i>
                      {{ __('Ventes Annulées') }}
                    </a>

                    <a class="dropdown-item {{ request()->routeIs('sales.customers') ? 'active' : '' }}" href="{{ route('sales.customers') }}">
                        <i class="bi bi-people" style="width: 24px; height:24px"></i>
                        {{ __('Clients') }}
                    </a>
                  </div>

                </div>
              </div>
            </li>
            @endcan

            <li class="nav-item">
              <a href="{{ route('sales.products') }}" class="btn {{ request()->routeIs('sales.products') ? 'active' : '' }}" style="margin-right: 5px;">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <i class="bi bi-app" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                    {{ __('Produits') }}
                </span>
              </a>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </div>
