@extends('layouts.master')

@section('title', __('Point Of Sales'))

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
            <div class="markdown">
              <div>
                <div class="d-flex mb-3">
                  <h1 class="m-0">{{ __('Version') }}</h1>
                </div>
              </div>
              <div class="mb-4">
                <h2 class="mb-2">
                  <span>1.0.0-beta1</span> –
                  <small></small>
                </h2>
                <ul>
                  <li>{{ __('nouveau') }} <code class="language-plaintext highlighter-rouge">Photogrid</code> page</li>
                  <li><code class="language-plaintext highlighter-rouge">Steps</code> component improvements</li>
                  <li>fix <a href="https://github.com/tabler/tabler/issues/1348" target="_blank" rel="noopener">#1348</a>: Make job listing responsive for smaller devices</li>
                  <li>homepage navbar fix</li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
