@extends('layouts.master')

@section('title', __('Point Of Sales'))

@section('styles')
    <link href="{{ asset('dist/libs/plyr/dist/plyr.css') }}?1668287865" rel="stylesheet"/>
@endsection
@section('breadcrumb')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">
          Documentation
        </h2>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="page-body">
  <div class="container-xl">
    <div class="row gx-lg-5">

        @include('pos::layouts.docs')

      <div class="col-lg-9">
        <div class="card card-lg">

            <div class="card-body">
                <h3 class="card-title">{{ __('Faites le premier pas !') }}</h3>
                <div id="player-youtube" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY"></div>
            </div>
          <div class="card-body">
            <div class="markdown">
              <div>
                <div class="d-flex mb-3">
                  <h1 class="m-0">{{ __('Commencer avec POS') }}</h1>
                </div>
              </div>
              <h2 id="what-are-the-benefits">What are the benefits?</h2>
              <p>Tabler is a perfect solution if you want to create an interface which is not only user-friendly but also fully responsive. Thanks to the big choice of ready-made components, you can customize your design and adapt it to the needs of even the most demanding users. On top of that, Tabler is an open source solution, continuously developed and improved by the open source community.</p>
              <h2 id="set-up-the-environment">Set up the environment</h2>
              <p>To use our build system and run our documentation locally, you’ll need a copy of Tabler’s source files. Follow the steps below:</p>
              <ol>
                <li><a href="https://nodejs.org/download/">Install Node.js</a>, which we use to manage our dependencies.</li>
                <li>Navigate to the root <code class="language-plaintext highlighter-rouge">/tabler</code> directory and run <code class="language-plaintext highlighter-rouge">npm install</code> to install our local dependencies listed in <code class="language-plaintext highlighter-rouge">package.json</code>.</li>
                <li><a href="https://ruby-lang.org/en/documentation/installation/">Install Ruby</a> - the recommended version is <a href="https://cache.ruby-lang.org/pub/ruby/2.5/ruby-2.5.5.tar.gz">2.5.5</a>.</li>
                <li><a href="https://bundler.io">Install Bundler</a> with <code class="language-plaintext highlighter-rouge">gem install bundler</code> and, finally, run <code class="language-plaintext highlighter-rouge">bundle install</code>. It will install all Ruby dependencies, such as <a href="https://jekyllrb.com">Jekyll and plugins</a>.</li>
              </ol>
              <h3 id="windows-users">Windows users</h3>
              <ol>
                <li><a href="https://git-scm.com/download/win">Install Git</a> in <code class="language-plaintext highlighter-rouge">C:\Program Files\git\bin</code> directory and run <code class="language-plaintext highlighter-rouge">npm config set script-shell "C:\Program Files\git\bin\bash.exe"</code> to change the default shell.</li>
                <li><a href="https://rubyinstaller.org/downloads/">Install Ruby+Devkit</a> - recommended version is <a href="https://github.com/oneclick/rubyinstaller2/releases/download/RubyInstaller-2.5.5-1/rubyinstaller-devkit-2.5.5-1-x86.exe">2.5.5</a>.</li>
                <li><a href="https://jekyllrb.com/docs/installation/windows/">Read guide</a> to get Jekyll up and running without problems.</li>
              </ol>
              <p>Once you’ve completed the setup, you’ll be able to run the various commands provided from the command line.</p>
              <h2 id="build-tabler-locally">Build Tabler locally</h2>
              <ol>
                <li>From the root <code class="language-plaintext highlighter-rouge">/tabler</code> directory, run <code class="language-plaintext highlighter-rouge">npm run start</code> in the command line.</li>
                <li>Open <a href="http://localhost:3000">http://localhost:3000</a> in your browser, and voilà.</li>
                <li>Any change in <code class="language-plaintext highlighter-rouge">/src</code> directory will build the application and refresh the page.</li>
              </ol>
              <h2 id="bugs-and-feature-requests">Bugs and feature requests</h2>
              <p>Found a bug or have a feature request? <a href="https://github.com/tabler/tabler/issues/new">Please open a new issue</a>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('third_party_stylesheets')
    <!-- Libs JS -->
    <script src="{{ asset('dist/libs/plyr/dist/plyr.min.js') }}?1668287865" defer></script>
    <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.Plyr && (new Plyr('#player-youtube'));
    });
    // @formatter:on
    </script>
@endsection
