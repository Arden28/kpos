
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">

            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('main') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="bi bi-arrow-left" style="width: 28px; height:28px; "></i>
                </span>
              </a>
            </li>

            <li class="nav-item">
                {{-- <li class="nav-item"> --}}
              <a class="btn {{ request()->routeIs('inventory*') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('inventory.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="bi bi-speedometer" style="width: 24px; height: 24px;"></i>
                </span>
                <span class="nav-link-title">
                    {{ __('Aperçu') }}
                </span>
              </a>
            </li>


            @can('access_products')
            <li class="nav-item dropdown">
              <a class="btn {{ request()->routeIs('products*') || request()->routeIs('*product-categories.index') ? 'active' : '' }}" style="margin-right: 5px;" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-box" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ __('Produits') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">

                    <a class="dropdown-item  {{ request()->routeIs('*product-categories.index') ? 'active' : '' }}" href="{{ route('product-categories.index') }}">

                      {{ __('Catégories de Produits') }}
                    </a>

                    <a class="dropdown-item {{ request()->routeIs('product-units.*') ? 'active' : '' }}" href="{{ route('product-units.index') }}">

                        {{ __('Unités') }}
                    </a>

                  </div>

                  {{-- Right --}}
                  <div class="dropdown-menu-column">


                    <a class="dropdown-item  {{ request()->routeIs('*products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">

                        {{ __('Produits') }}
                    </a>

                    {{-- <a class="dropdown-item {{ request()->routeIs('*products.create') ? 'active' : '' }}" href="{{ route('products.create') }}">

                        {{ __('Ajouter un produit') }}
                    </a> --}}

                  </div>
                </div>
              </div>
            </li>
            @endcan


            @can('access_products')
            <li class="nav-item dropdown ">
              <a style="margin-right: 5px;" class="btn {{ request()->routeIs('adjustments*') || request()->routeIs('purchases*') || request()->routeIs('purchase-payments.*') || request()->routeIs('purchase-return-payments.*') || request()->routeIs('purchase-returns*') ? 'active' : '' }}" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-tools" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ __('Opérations') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">

                    @can('access_purchases')
                        <a href="{{ route('purchases.index') }}" class="dropdown-item {{ request()->routeIs('purchases.*')? 'active' : '' }}">

                        {{ __('Réapprovisionnement') }}
                        </a>
                    @endcan

                    @can('access_purchase_returns')
                        <a href="{{ route('purchase-returns.index') }}" class="dropdown-item {{ request()->routeIs('purchase-returns.*')? 'active' : '' }}">

                        {{ __('Réapprovisionnement annulés') }}
                        </a>
                    @endcan
                  </div>

                  {{-- Right --}}
                  <div class="dropdown-menu-column">
                    @can('access_adjustments')
                        <a class="dropdown-item {{ request()->routeIs('*adjustments.*') ? 'active' : '' }}" href="{{ route('adjustments.index') }}">

                            {{ __("Ajustements de stock") }}
                        </a>
                    @endcan

                    @can('access_adjustments')
                        <a class="dropdown-item  {{ request()->routeIs('barcode.print') ? 'active' : '' }}" href="{{ route('barcode.print') }}">
                            <i class="bi bi-upc-scan" style="width: 24px; height: 24px;"></i>
                          </span>
                          <span class="nav-link-title">
                            {{ __('Code Barre') }}
                          </span>
                        </a>
                    @endcan
                  </div>
                </div>
              </div>
            </li>
            @endcan


            {{-- <li class="nav-item">
                <a class="btn {{ request()->routeIs('barcode.print') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('barcode.print') }}">
                    <i class="bi bi-upc-scan" style="width: 24px; height: 24px;"></i>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Code Barre') }}
                  </span>
                </a>
            </li> --}}


            <li class="nav-item">
                <a class="btn {{ request()->routeIs('inventory.suppliers') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('inventory.suppliers') }}">
                    <i class="bi bi-people" style="width: 24px; height:24px"></i>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Fournisseurs') }}
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
