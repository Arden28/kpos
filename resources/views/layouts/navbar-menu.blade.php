
      <div class="navbar-expand-md d-print-none">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">

                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" data-turbolinks>
                    <a class="btn" style="margin-right: 5px;" href="{{ route('dashboard') }}" >
                        {{-- <a class="nav-link" href="{{ route('dashboard') }}" > --}}
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                      </span>
                      <span class="nav-link-title">
                          {{ __('Acceuil') }}
                      </span>
                    </a>
                </li>


                <li class="nav-item {{ request()->routeIs('accounting') ? 'active' : '' }}" data-turbolinks>
                  <a class="btn" style="margin-right: 5px;" href="{{ route('finance.index') }}" >
                      {{-- <a class="nav-link" href="{{ route('dashboard') }}" > --}}
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-clipboard-data" style="width: 24px; height:24px"></i>
                    </span>
                    <span class="nav-link-title">
                        {{ __('Finance') }}
                    </span>
                  </a>
              </li>

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

                <li class="nav-item dropdown
                {{ request()->routeIs('products.*') || request()->routeIs('product-categories.*') ? 'active' : '' }}
                ">
                  {{-- <a class="nav-link dropdown-toggle" data-turbolinks="false" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" > --}}

                <a class="btn" style="margin-right: 5px;" data-turbolinks="false" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                        <i class="bi bi-app" style="width: 24px; height: 24px;"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Apps') }}
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">

                      {{-- Left --}}
                      <div class="dropdown-menu-column">

                        {{-- @can('access_purchases')
                        <div class="dropend">
                            <a class="dropdown-item dropdown-toggle {{ request()->routeIs('purchases.*')? 'active' : '' }}" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{ __('Purchases') }}
                            </a>
                            <div class="dropdown-menu">
                            @can('create_purchases')
                            <a href="{{ route('purchases.create') }}" class="dropdown-item {{ request()->routeIs('purchases.create')? 'active' : '' }}">
                                {{ __('Add Purchase') }}
                            </a>
                            @endcan

                            <a href="{{ route('purchases.index') }}" class="dropdown-item {{ request()->routeIs('purchases.index')? 'active' : '' }}">
                                {{ __('All Purchases') }}
                            </a>
                            </div>
                        </div>
                        @endcan --}}

                        @can('access_sales')
                        <div class="dropend">
                            <a class="dropdown-item dropdown-toggle {{ request()->routeIs('sales.*')? 'active' : '' }}" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{-- <i class="bi bi-receipt"></i> --}}
                            {{ __('Sales') }}
                            </a>
                            <div class="dropdown-menu">
                            @can('create_sales')
                            <a href="{{ route('sales.create') }}" class="dropdown-item {{ request()->routeIs('sales.create')? 'active' : '' }}">
                                {{ __('Add Sale') }}
                            </a>
                            @endcan

                            <a href="{{ route('sales.index') }}" class="dropdown-item {{ request()->routeIs('sales.index')? 'active' : '' }}">
                                {{ __('All Sales') }}
                            </a>
                            </div>
                        </div>
                        @endcan

                        @can('access_expenses')
                        <div class="dropend">
                          <a class="dropdown-item dropdown-toggle {{ request()->routeIs('expenses.*')? 'active' : '' }}" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{-- <i class="bi bi-receipt"></i> --}}
                            {{ __('Expenses') }}
                          </a>
                          <div class="dropdown-menu">
                            @can('access_expense_categories')
                            <a href="{{ route('expense-categories.index') }}" class="dropdown-item {{ request()->routeIs('expense-categories.*')? 'active' : '' }}">
                              {{ __('Catégories') }}
                            </a>
                            @endcan

                            @can('create_expenses')
                            <a href="{{ route('expenses.create') }}" class="dropdown-item {{ request()->routeIs('expenses.create')? 'active' : '' }}">
                              {{ __('Ajouter une dépense') }}
                            </a>
                            @endcan

                            <a href="{{ route('expenses.index') }}" class="dropdown-item {{ request()->routeIs('expenses.index')? 'active' : '' }}">
                              {{ __('Toutes les dépenses') }}
                            </a>
                          </div>
                        </div>
                        @endcan

                      </div>

                      {{-- Right --}}
                      <div class="dropdown-menu-column">

                        @can('access_quotations')
                        <div class="dropend">
                          <a class="dropdown-item dropdown-toggle {{ request()->routeIs('quotations.*')? 'active' : '' }}" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{-- <i class="bi bi-receipt"></i> --}}
                            {{ __('Quotations') }}
                          </a>
                          <div class="dropdown-menu">
                            @can('create_quotations')
                            <a href="{{ route('quotations.create') }}" class="dropdown-item {{ request()->routeIs('quotations.create')? 'active' : '' }}">
                              {{ __('Create Quotation') }}
                            </a>
                            @endcan

                            <a href="{{ route('quotations.index') }}" class="dropdown-item {{ request()->routeIs('quotations.*')? 'active' : '' }}">
                              {{ __('All Quotations') }}
                            </a>
                          </div>
                        </div>
                        @endcan

                        @can('access_sales')
                        <div class="dropend">
                          <a class="dropdown-item dropdown-toggle {{ request()->routeIs('sale-returns.*')? 'active' : '' }}" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{-- <i class="bi bi-receipt"></i> --}}
                            {{ __('Sales Return') }}
                          </a>
                          <div class="dropdown-menu">
                            {{-- @can('create_sales') --}}
                            <a href="{{ route('sale-returns.create') }}" class="dropdown-item {{ request()->routeIs('sale-returns.create')? 'active' : '' }}">
                              {{ __('Add Sale Return') }}
                            </a>
                            {{-- @endcan --}}

                            <a href="{{ route('sale-returns.index') }}" class="dropdown-item {{ request()->routeIs('sale-returns.index')? 'active' : '' }}">
                              {{ __('All Sales Return') }}
                            </a>
                          </div>
                        </div>
                        @endcan

                      </div>
                    </div>
                  </div>
                </li>

                {{-- Customers | Suppliers Management --}}
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

                {{-- @can('access_customers|access_suppliers')
                <div class="dropend">
                  <a class="dropdown-item dropdown-toggle {{ request()->routeIs('customers.*') || request()->routeIs('suppliers.*') ? 'active' : '' }}" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    {{ __('CRM') }}
                    <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">{{ __('New') }}</span>
                  </a>
                  <div class="dropdown-menu">
                    @can('access_customers')
                    <a href="{{ route('customers.index') }}" class="dropdown-item {{ request()->routeIs('customers.*')? 'active' : '' }}">
                      {{ __('Customers') }}
                    </a>
                    @endcan

                    @can('access_suppliers')
                    <a href="{{ route('suppliers.index') }}" class="dropdown-item {{ request()->routeIs('suppliers.*')? 'active' : '' }}">
                      {{ __('Suppliers') }}
                    </a>
                    @endcan

                  </div>
                </div>
                @endcan --}}

                {{-- Employee Management --}}
                @can('access_user_management')
                <li class="nav-item {{ request()->routeIs('roles*') ? 'active' : '' }}">
                  <a class="btn" style="margin-right: 5px;" href="{{ route('users.index') }}" >
                    {{-- <a class="nav-link" href="{{ route('users.index') }}" > --}}
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <i class="bi bi-people" style="width: 24px; height:24px"></i>
                    </span>
                    <span class="nav-link-title">
                      {{ __('Personnel') }}
                    </span>
                  </a>
                </li>
                @endcan

                {{-- POS Management --}}
                @can('access_pos')
                <li class="nav-item">
                @if(Auth::user()->team->subscription())

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

                {{-- Settings --}}
                @can('access_pos')
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
