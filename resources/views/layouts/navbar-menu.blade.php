
      <div class="navbar-expand-md d-print-none">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">

                <li class="nav-item" data-turbolinks>
                    <a class="btn {{ request()->routeIs('dashboard') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('main') }}" >
                        {{-- <a class="nav-link" href="{{ route('dashboard') }}" > --}}
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                      </span>
                      <span class="nav-link-title">
                          {{ __('Acceuil') }}
                      </span>
                    </a>
                </li>

                @if(module('finance'))
                <li class="nav-item" data-turbolinks>
                  <a class="btn {{ request()->routeIs('accounting') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('finance.index') }}" >
                      {{-- <a class="nav-link" href="{{ route('dashboard') }}" > --}}
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-clipboard-data" style="width: 24px; height:24px"></i>
                    </span>
                    <span class="nav-link-title">
                        {{ __('Finance') }}
                    </span>
                  </a>
                </li>
                @endif

                @if(module('inventory'))
                    <li class="nav-item">
                        <a class="btn" style="margin-right: 5px;" href="{{ route('inventory.index') }}" >
                            {{-- <a class="nav-link" href="{{ route('inventory.index') }}" > --}}
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <i class="bi bi-box-seam" style="width: 24px; height:24px"></i>
                        </span>
                        <span class="nav-link-title">
                            {{ __('Inventaire') }}
                        </span>
                        </a>
                    </li>
                @endif

                {{-- Customers | Suppliers Management --}}
                @if(module('crm'))
                    @can('access_customers')
                    <li class="nav-item">
                    <a class="btn" style="margin-right: 5px;" href="{{ route('customers.index') }}" >
                        {{-- <a class="nav-link" href="{{ route('customers.index') }}" > --}}
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <i class="bi bi-people-fill" style="width: 24px; height:24px"></i>
                        </span>
                        <span class="nav-link-title">
                        {{ __('CRM') }}
                        </span>
                    </a>
                    </li>
                    @endcan
                @endif


                {{-- Sales Management --}}
                @if(module('sales'))
                @can('access_sales')
                <li class="nav-item">
                  <a class="btn" style="margin-right: 5px;" href="{{ route('quotations.index') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="bi bi-bar-chart-line-fill" style="width: 24px; height:24px"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Ventes') }}
                    </span>
                  </a>
                </li>
                @endcan
                @endif


                {{-- Employee Management --}}
                @if(module('hr'))
                @can('access_user_management')
                <li class="nav-item {{ request()->routeIs('roles*') ? 'active' : '' }}">
                  <a class="btn" style="margin-right: 5px;" href="{{ route('users.index') }}" >
                    {{-- <a class="nav-link" href="{{ route('users.index') }}" > --}}
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <i class="bi bi-people" style="width: 24px; height:24px"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Personnel') }}
                      {{-- <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ __('New') }}</span> --}}
                    </span>
                  </a>
                </li>
                @endcan
                @endif

                {{-- POS Management --}}
                @if(module('pos'))
                @can('access_pos')
                    <li class="nav-item">
                        @if(subscribed(Auth::user()->team->id))

                            {{-- @if (standard() && standard()->isActive() === true) --}}
                            @if (standard())
                                <a class="btn" style="margin-right: 5px;" href="{{ route('app.pos.dashboard') }}" >
                            @else
                                <a  class="btn" style="margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-report">
                            @endif
                        @else
                            <a  class="btn" style="margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-report">
                        @endif

                        <i class="bi bi-shop" style="width: 24px; height:24px"></i>
                        <span class="nav-link-title">
                        {{ __('POS') }}
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            @include('utils.standard_badge')
                        </span>
                        </span>
                    </a>
                    </li>
                @endcan
                @endif

                {{-- Settings --}}
                @can('access_settings')
                <li class="nav-item">
                  <a class="btn" style="margin-right: 5px;" href="{{ route('settings.index') }}" >
                    {{-- <a class="nav-link" href="{{ route('settings.index') }}" > --}}
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <i class="bi bi-gear" style="width: 24px; height:24px;"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Paramètres') }}
                    </span>
                  </a>
                </li>
                @endcan

                {{-- @can('access_settings')
                <li class="nav-item dropdown {{ request()->routeIs('currencies*') ? 'c-show' : '' }}">
                  <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <i class="bi bi-gear" style="width: 24px; height:24px;"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Paramètre') }}
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">

                        <a class="dropdown-item {{ request()->routeIs('currencies*') ? 'c-active' : '' }}" href="{{ route('currencies.index') }}">
                          {{ __('Devises') }}
                        </a>
                        <a class="dropdown-item" href="#">
                          {{ __('Factures') }}
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ __('New') }}</span>
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('settings*') ? 'c-active' : '' }}" href="{{ route('settings.index') }}">
                          {{ __('Paramètre Généraux') }}
                        </a>

                      </div>

                    </div>
                  </div>
                </li>
                @endcan --}}


                <li class="nav-item dropdown">
                  <a class="btn" style="margin-right: 5px;" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <i class="bi bi-life-preserver" style="width: 24px; height: 24px;"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Help') }}
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">
                      {{ __('Customer Service') }}
                      <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ __('New') }}</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      {{ __('Documentation') }}
                    </a>
                    <a class="dropdown-item" href="#" target="_blank">
                      {{ __('License') }}
                    </a>
                  </div>
                </li>


                {{-- <li class="nav-item disabled">
                    <a class="btn" href="#" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <i class="bi bi-app-indicator"></i>
                      </span>
                      <span class="nav-link-title">
                          {{ __('Apps Store') }}
                      </span>
                    </a>
                </li> --}}

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
