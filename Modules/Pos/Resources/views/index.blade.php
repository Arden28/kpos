@extends('pos::layouts.master')

@section('title', __('Point Of Sales'))

@section('breadcrumb')
<div class="page-header d-print-none text-white">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          {{ __('Magasin') }}
        </div>
        <h2 class="page-title">
          {{ $physical->name }}
        </h2>

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

            {{-- close session --}}
            <livewire:pos::delete-session  :pos="$pos" />

            {{-- <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-session-{{ $physical->id }}">

                <i class="bi bi-box-arrow-right"></i>
                {{ __('Fermer') }}
            </a>
            @include('pos::includes.modals.delete-session') --}}

          <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">

            <i class="bi bi-box-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    @include('utils.alerts')
                </div>
                <div class="col-lg-7">
                    <livewire:search-product/>
                    <livewire:pos.product-list :categories="$product_categories"/>
                </div>
                <div class="col-lg-5">
                    <livewire:pos.checkout :cart-instance="'sale'" :customers="$customers" :physical="$physical"/>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            window.addEventListener('showCheckoutModal', event => {
                $('#checkoutModal').modal('show');

                $('#paid_amount').maskMoney({
                    prefix:'{{ settings()->currency->symbol }}',
                    thousands:'{{ settings()->currency->thousand_separator }}',
                    decimal:'{{ settings()->currency->decimal_separator }}',
                    allowZero: false,
                });

                $('#total_amount').maskMoney({
                    prefix:'{{ settings()->currency->symbol }}',
                    thousands:'{{ settings()->currency->thousand_separator }}',
                    decimal:'{{ settings()->currency->decimal_separator }}',
                    allowZero: true,
                });

                $('#paid_amount').maskMoney('mask');
                $('#total_amount').maskMoney('mask');

                $('#checkout-form').submit(function () {
                    var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
                    $('#paid_amount').val(paid_amount);
                    var total_amount = $('#total_amount').maskMoney('unmasked')[0];
                    $('#total_amount').val(total_amount);
                });
            });
        });
    </script>

    {{-- Disallow page refreshing --}}
    {{-- <script>
        window.addEventListener('beforeunload', function (e) {
        // Cancel the event
            e.preventDefault();
            // Chrome requires returnValue to be set
            e.returnValue = '';

            // Display a warning message
            const message = 'Are you sure you want to leave?';
            e.returnValue = message; // Set a custom message for some browsers
            return message; // Return the message for other browsers
        });
    </script> --}}
