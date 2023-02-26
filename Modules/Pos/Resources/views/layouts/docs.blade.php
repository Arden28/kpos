
<div class="d-none d-lg-block col-lg-3">
    <ul class="nav nav-pills nav-vertical">

      <li class="nav-item">
        <a href="#menu-base" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
            {{ __('Commencer') }}
          <span class="nav-link-toggle"></span>
        </a>
        <ul class="nav nav-pills collapse" id="menu-base">
          <li class="nav-item">
            <a href="{{ route('app.pos.docs.index') }}" class="nav-link">
              {{ __('Commencer') }}
            </a>
          </li>
          <li class="nav-item">
            <a href="../docs/browser-support.html" class="nav-link">
              {{ __('Pré-requis') }}
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{ route('app.pos.docs.version') }}" class="nav-link">
            {{ __('Version(s)') }}
          <span class="badge bg-primary-lt ms-auto">1.0.0-beta4</span>
        </a>
      </li>
    </ul>
  </div>
