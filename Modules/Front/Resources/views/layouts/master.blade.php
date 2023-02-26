<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta_ref')

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('page_title') | Koverae.com</title>

    @yield('open-graph')
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/favicons/favicon.png')}}">
    <link rel="manifest" href="{{ asset('front/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{ asset('front/assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('front/assets/css/theme.css')}}" rel="stylesheet" />
    @yield('styles')

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

    <!-- ===============================================-->
    <!--    NavBar Content-->
    <!-- ===============================================-->
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="{{ asset('front/assets/img/logo.svg')}}" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Apps</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#validation">Prix</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">Fonctionnalités</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Support</a></li>
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="http://app.koverae.test/auth/login" target="_blank">Se connecter</a>
                <a class="btn btn-warning ms-3" href="http://app.koverae.test/auth/register" target="_blank">Commencer Gratuitement !</a></div>
          </div>
        </div>
      </nav>

      @yield('content')


<!-- ============================================-->
<!-- <section> begin ============================-->
<footer class="pb-2 pb-lg-5">

    <div class="container">
      <div class="row border-top border-top-secondary pt-7">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="{{ asset('front/assets/img/logo.svg')}}" width="184" alt="" /></div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
          <p class="fs-2 mb-lg-4">Liens Utiles</p>
          <ul class="list-unstyled mb-0">
            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Notre Société</a></li>
            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Notre Blog</a></li>
            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Contactez-nous</a></li>
            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">FAQ</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
          <p class="fs-2 mb-lg-4">Trucs juridiques</p>
          <ul class="list-unstyled mb-0">
            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Clause de non-responsabilité</a></li>
            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Politique de confidentialité</a></li>
            <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Conditions d'utilisation</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 order-2 order-md-2 order-lg-4">
          <p class="fs-2 mb-lg-4">
            Restez informé sur nos offres.</p>
          <form class="mb-3">
            <input class="form-control" type="email" placeholder="Enter your phone Number" aria-label="phone" />
          </form>
          <button class="btn btn-warning fw-medium py-1">M'inscrire</button>
        </div>
      </div>
    </div><!-- end of .container-->

  </footer>
  <!-- <section> close ============================-->
  <!-- ============================================-->

  <!-- ============================================-->
  <!-- <section> begin ============================-->
  <section class="text-center py-0">

    <div class="container">
      <div class="container border-top py-3">
        <div class="row justify-content-between">
          <div class="col-12 col-md-auto mb-1 mb-md-0">
            <p class="mb-0">
                &copy; <script>document.write(new Date().getFullYear());</script> Koverae SA
            </p>
          </div>
          <div class="col-12 col-md-auto">
            <p class="mb-0">
              Fait par <a class="text-decoration-none ms-1" href="https://visibilty242.com/" target="_blank">Visibility242</a></p>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->

  </section>
  <!-- <section> close ============================-->
  <!-- ============================================-->

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    @yield('third_party')


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('front/vendors/@popperjs/popper.min.js')}}"></script>
    <script src="{{ asset('front/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('front/vendors/is/is.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('front/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/theme.js')}}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
    @yield('scripts')
  </body>

</html>
