<div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New report</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-0 flex-fill">
                  <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
                    <div class="container container-tight my-5 px-lg-5">
                      <div class="text-center mb-4">
                        <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
                      </div>
                      <h2 class="h3 text-center mb-3">
                        Login to your account
                      </h2>
                      <form action="./" method="get" autocomplete="off" novalidate>
                        <div class="mb-3">
                          <label class="form-label">Email address</label>
                          <input type="email" class="form-control" placeholder="your@email.com" autocomplete="off">
                        </div>
                        <div class="mb-2">
                          <label class="form-label">
                            Password
                            <span class="form-label-description">
                              <a href="./forgot-password.html">I forgot password</a>
                            </span>
                          </label>
                          <div class="input-group input-group-flat">
                            <input type="password" class="form-control"  placeholder="Your password"  autocomplete="off">
                            <span class="input-group-text">
                              <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                              </a>
                            </span>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label class="form-check">
                            <input type="checkbox" class="form-check-input"/>
                            <span class="form-check-label">Remember me on this device</span>
                          </label>
                        </div>
                        <div class="form-footer">
                          <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                      </form>
                      <div class="text-center text-muted mt-3">
                        Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
                    <!-- Photo -->
                    <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg')}})"></div>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>
</div>
