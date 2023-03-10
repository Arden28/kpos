
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
              <a class="nav-link" href="{{ route('hr.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                    {{ __('Tableau de bord') }}
                </span>
              </a>
            </li>

            @can('access_user_management')
            <li class="nav-item dropdown {{ request()->routeIs('users*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-people" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ __('Employ??s') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">
                    <a class="dropdown-item  {{ request()->routeIs('*users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">

                      {{ __('Tous les employ??s') }}
                    </a>

                  </div>

                  {{-- Right --}}
                  <div class="dropdown-menu-column">

                    <a class="dropdown-item {{ request()->routeIs('*users.create') ? 'active' : '' }}" href="{{ route('users.create') }}">

                        {{ __('Ajouter un employ??') }}
                    </a>

                  </div>
                </div>
              </div>
            </li>
            @endcan

            @can('access_user_management')
            <li class="nav-item dropdown {{ request()->routeIs('roles*') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <i class="bi bi-people" style="width: 24px; height:24px"></i>
                </span>
                <span class="nav-link-title">
                  {{ __('R??les') }}
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">

                  {{-- Left --}}
                  <div class="dropdown-menu-column">
                    <a class="dropdown-item {{ request()->routeIs('*roles.index') ? 'active' : '' }}" href="{{ route('roles.index') }}">

                      {{ __('Tous les r??les') }}
                    </a>

                  </div>

                  {{-- Right --}}
                  <div class="dropdown-menu-column">

                    <a class="dropdown-item {{ request()->routeIs('roles.create') ? 'active' : '' }}" href="{{ route('roles.create') }}">

                        {{ __('Ajouter un r??le') }}
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
                  {{ __('Documentation') }}
                </span>
              </a>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </div>
