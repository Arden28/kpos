
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

            <li class="nav-item {{ request()->routeIs('settings*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('settings.index') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <i class="bi bi-gear" style="width: 24px; height:24px;"></i>
                </span>
                <span class="nav-link-title">
                    {{ __('Paramètres Généraux') }}
                </span>
              </a>
            </li>


          </ul>

        </div>
      </div>
    </div>
  </div>
