@extends('layouts.master')

@section('title', __('Point de Vente'))

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Point de Vente') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">

        @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <span>{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
        @endif
        @if($pos->count() > 0)

            @foreach($pos as $p)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                        <div>
                            <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar placeholder-wave" style="background-image: url(./static/avatars/003m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="card-title">
                                    {{ $p->name }}
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-actions">
                            <div class="dropdown">
                            <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('app.pos.edit', $p->id) }}">{{ __('Modifier') }}</a>
                                <a class="dropdown-item" href="{{ route('app.pos.session.single', $p->id) }}">{{ __('Sessions') }}</a>
                                <a class="dropdown-item" href="{{ route('app.pos.order.single', $p->id) }}">{{ __('Commandes') }}</a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="container col-md-12 text-center" style="margin-top: 12px">

                                {{-- @if(session()->has('pos_session') && session('pos_id') == $p->id) --}}
                                @if($p->isActive() && $p->currentPosSession())

                                    @if($p->id == Auth::user()->current_pos_id)
                                        <livewire:pos::session.keep-on :session="$p->currentPosSession()" />
                                    @else
                                        <livewire:pos::session.join :session="$p->currentPosSession()" />
                                    @endif

                                @else

                                    <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-session-{{ $p->id }}">{{ __('Nouvelle Session') }}</a>

                                @endif
                            </div>
                            <hr>
                                <div class="container col-md-12">
                                    @php
                                        $latest_session = \Modules\Pos\Entities\PhysicalPosSession::where('pos_id', $p->id)->latest()->first();
                                    @endphp
                                    @if($latest_session)

                                        <ul>
                                            @php

                                                $date = \Carbon\Carbon::parse($latest_session->start_date);

                                                if($latest_session->end_date){

                                                    $end_date = \Carbon\Carbon::parse($latest_session->start_date)->locale('fr')->isoFormat('LL LTS');
                                                }else{
                                                    $end_date ="";
                                                }

                                            @endphp
                                            <li>
                                                Dernière date de fermeture : {{ $end_date }}
                                            </li>
                                            <li>
                                                Dernier solde de fermeture : {{ format_currency($latest_session->end_amount) }}
                                            </li>

                                        </ul>
                                    @else
                                        <p>{{ __("Aucune session disponible") }}</p>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>

                {{-- Modal --}}

                @include('pos::includes.modals.create-session')
            @endforeach

        @else
                <p>{{ __('Veuillez créer un point de vente') }} <a href="{{ route('app.pos.create') }}">{{ __('ici') }}</a></p>
        @endif

      </div>
    </div>
  </div>


@endsection

@push('page_scripts')

<script src="{{ asset('js/jquery-mask-money.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#start_amount').maskMoney({
            prefix:'{{ settings()->currency->symbol }}',
            thousands:'{{ settings()->currency->thousand_separator }}',
            decimal:'{{ settings()->currency->decimal_separator }}',
        });

        $('#session-form').submit(function () {
            var start_amount = $('#start_amount').maskMoney('unmasked')[0];
            $('#start_amount').val(start_amount);
        });
    });
</script>
@endpush
