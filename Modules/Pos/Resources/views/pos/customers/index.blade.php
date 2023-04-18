@extends('pos::layouts.master')

@section('page_title', __('Clients'))

@section('breadcrumb')
<div class="page-header d-print-none text-black">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          {{ __('Magasin') }}
        </div>
        <h2 class="page-title" style="color: white">
          {{ __('Clients') }}
        </h2>

      </div>
    </div>
  </div>
</div>
@endsection

@section('content')

    <div class="page-body d-print-none">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                {!! $dataTable->table() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}
@endpush
