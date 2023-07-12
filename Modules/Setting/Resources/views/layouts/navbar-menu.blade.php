
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
              <a class="btn {{ request()->routeIs('settings.index') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('settings.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="bi bi-gear" style="width: 24px; height:24px;"></i>
                </span>
                <span class="nav-link-title">
                    {{ __('Paramètres Généraux') }}
                </span>
              </a>
            </li>


            @foreach (modules() as $module)
                @if (module($module->slug))
                    <li class="nav-item">
                        @if ($module->slug == 'finance')
                        <a class="btn {{ request()->routeIs('settings.users') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('finance.index') }}">
                        @elseif ($module->slug == 'inventory')
                            <a class="btn {{ request()->routeIs('settings.users') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('inventory.index') }}">
                        @elseif ($module->slug == 'hr')
                            <a class="btn {{ request()->routeIs('settings.users') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('users.index') }}">
                        @elseif ($module->slug == 'sales')
                            <a class="btn {{ request()->routeIs('settings.users') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('sales.index') }}">
                        @elseif ($module->slug == 'crm')
                            <a class="btn {{ request()->routeIs('settings.users') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('crm.index') }}">
                        @elseif ($module->slug == 'pos')
                            <a class="btn {{ request()->routeIs('settings.users') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('app.pos.dashboard') }}">
                        @endif
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <img class="custom-image" src="{{ asset('assets/images/apps/'.$module->slug.'.png') }}" alt="">
                            </span>
                            <span class="nav-link-title">
                                {{ $module->name }}
                            </span>
                        </a>
                    </li>
                @endif
            @endforeach

            {{-- <li class="nav-item">
              <a class="btn {{ request()->routeIs('settings.users') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('settings.users') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="bi bi-people" style="width: 24px; height:24px;"></i>
                </span>
                <span class="nav-link-title">
                    {{ __('Utilisateurs') }}
                </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="btn {{ request()->routeIs('currencies.*') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('currencies.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="bi bi-currency-exchange" style="width: 24px; height:24px;"></i>
                </span>
                <span class="nav-link-title">
                    {{ __('Devises') }}
                </span>
              </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="btn {{ request()->routeIs('settings.inventory') ? 'active' : '' }}" style="margin-right: 5px;" href="{{ route('settings.index') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <i class="bi bi-box-seam" style="width: 24px; height:24px;"></i>
                  </span>
                  <span class="nav-link-title">
                      {{ __('Inventaire') }}
                  </span>
                </a>
            </li>
              @can('access_customers')
              <li class="nav-item">
                <a class="btn {{ request()->routeIs('crm.*') ? 'active' : '' }}" href="{{ route('customers.index') }}" style="margin-right: 5px;" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <i class="bi bi-people-fill" style="width: 24px; height:24px"></i>
                  </span>
                  <span class="nav-link-title">
                    {{ __('CRM') }}
                  </span>
                </a>
            </li>
              @endcan

              @can('access_pos')
              <li class="nav-item">
                <a class="btn" href="{{ route('app.pos.index') }}" style="margin-right: 5px;" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <i class="bi bi-shop" style="width: 24px; height:24px"></i>
                  </span>
                  <span class="nav-link-title">
                    {{ __('Point de Vente') }}
                  </span>
                </a>
              </li>
              @endcan --}}

          </ul>

        </div>
      </div>
    </div>
  </div>
