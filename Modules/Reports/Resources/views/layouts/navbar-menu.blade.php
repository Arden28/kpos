
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

            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" data-turbolinks>
                <a class="nav-link" href="{{ route('dashboard') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                  </span>
                  <span class="nav-link-title">
                      {{ __('Tableau de bord') }}
                  </span>
                </a>
            </li>

            @can('access_reports')
            <li class="nav-item dropdown {{ request()->routeIs('*-report.index') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-clipboard-data" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ __('Analytics') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ request()->routeIs('profit-loss-report.index') ? 'active' : '' }}" href="{{ route('profit-loss-report.index') }}">

                      {{ __('Profit / Loss Report') }}
                    </a>
                    <a class="dropdown-item {{ request()->routeIs('payments-report.index') ? 'active' : '' }}" href="{{ route('payments-report.index') }}">

                      {{ __('Payments Report') }}
                    </a>
                    <a class="dropdown-item {{ request()->routeIs('sales-report.index') ? 'active' : '' }}" href="{{ route('sales-report.index') }}">

                        {{ __('Sales Report') }}
                    </a>
                  </div>

                  {{-- Right --}}
                  <div class="dropdown-menu-column">

                    <a class="dropdown-item {{ request()->routeIs('purchases-report.index') ? 'active' : '' }}" href="{{ route('purchases-report.index') }}">

                        {{ __('Purchases Report') }}
                    </a>

                    <a class="dropdown-item {{ request()->routeIs('sales-return-report.index') ? 'active' : '' }}" href="{{ route('sales-return-report.index') }}">

                        {{ __('Sales Return Report') }}
                    </a>

                    <a class="dropdown-item {{ request()->routeIs('purchases-return-report.index') ? 'c-active' : '' }}" href="{{ route('purchases-return-report.index') }}">

                        {{ __('Purchases Return Report') }}
                    </a>

                  </div>
                </div>
              </div>
            </li>
            @endcan

        </div>
      </div>
    </div>
  </div>
