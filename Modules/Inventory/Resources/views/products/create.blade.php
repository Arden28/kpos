@extends('layouts.master')

@section('title', __('Add Product'))

@section('styles')

    <!-- CoreUI CSS -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous"> --}}
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Add Product') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        @include('utils.alerts')
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Ajouter') }} <i class="bi bi-check"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                <input type="hidden" class="form-control" name="company_id" value="{{ Auth::user()->currentCompany->id }}">

                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                      <label for="product_name">{{ __('Nom du produit') }} <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" name="product_name" required value="{{ old('product_name') }}">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="product_code">{{ __('Code') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_code" required value="{{ old('product_code') }}">
                                    </div>
                                  </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label for="category_id">{{ __('Catégorie') }} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id" id="category_id" required>
                                            <option value="" selected disabled>{{ __('Sélectionnez une Catégorie') }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label for="barcode_symbology">{{ __('Code barre') }} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="product_barcode_symbology" id="barcode_symbology" required>
                                            <option value="" selected disabled>{{ __('Sélectionnez un symbole') }}</option>
                                            <option value="C128">Code 128</option>
                                            <option value="C39">Code 39</option>
                                            <option value="UPCA">UPC-A</option>
                                            <option value="UPCE">UPC-E</option>
                                            <option value="EAN13">EAN-13</option><option value="EAN8">EAN-8</option>
                                        </select>
                                      </div>
                                    </div>

                                  </div>


                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label for="product_cost">{{ __('Prix d\'achat / production') }} <span class="text-danger">*</span></label>
                                        <input id="product_cost" type="text" class="form-control" name="product_cost" required value="{{ old('product_cost') }}">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label for="product_price">{{ __('Prix de vente') }} <span class="text-danger">*</span></label>
                                        <input id="product_price" type="text" class="form-control" name="product_price" required value="{{ old('product_price') }}">
                                      </div>
                                    </div>

                                  </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_quantity">{{ __('Quantité') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="product_quantity" required value="{{ old('product_quantity') }}" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_stock_alert">{{ __('Stock d\'alerte') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="product_stock_alert" required value="{{ old('product_stock_alert') }}" min="0" max="100">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_order_tax">{{ __('Taxe') }} (%)</label>
                                            <input type="number" class="form-control" name="product_order_tax" value="{{ old('product_order_tax') }}" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_tax_type">{{ __('Type de taxe') }}</label>
                                            <select class="form-control" name="product_tax_type" id=j_type">
                                                <option value="" selected disabled>{{ __('Select Tax Type') }}</option>
                                                <option value="1">{{ __('Exclusive') }}</option>
                                                <option value="2">{{ __('Inclusive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_unit">{{ __('Unité') }}
                                                <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true"
                                                 data-bs-content="<p>{{ __('Ce texte sera placé après la quantité de produit. Ex : 20 bouteilles') }}</p>
                                                ">?</span>
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="product_unit" value="{{ old('product_unit') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="product_note">{{ __('Note') }}</label>
                                    <textarea name="product_note" id="product_note" rows="4 " class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">{{ __('Images du produit') }} <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ __('Max Files: 3, Max File Size: 1MB, Image Size: 400x400') }}"></i></label>
                                    <div class="dropzone d-flex flex-wrap align-items-center justify-content-center" id="document-dropzone">
                                        <div class="dz-message" data-dz-message>
                                            <i class="bi bi-cloud-arrow-up"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('third_party_scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection

@push('page_scripts')
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.upload') }}',
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png',
            maxFiles: 3,
            addRemoveLinks: true,
            dictRemoveFile: "<i class='bi bi-x-circle text-danger'></i> remove",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">');
                uploadedDocumentMap[file.name] = response.name;
            },
            removedfile: function (file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('dropzone.delete') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'file_name': `${name}`
                    },
                });
                $('form').find('input[name="document[]"][value="' + name + '"]').remove();
            },
            init: function () {
                @if(isset($product) && $product->getMedia('images'))
                var files = {!! json_encode($product->getMedia('images')) !!};
                for (var i in files) {
                    var file = files[i];
                    this.options.addedfile.call(this, file);
                    this.options.thumbnail.call(this, file, file.original_url);
                    file.previewElement.classList.add('dz-complete');
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">');
                }
                @endif
            }
        }
    </script>

    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#product_cost').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });
            $('#product_price').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });

            $('#product-form').submit(function () {
                var product_cost = $('#product_cost').maskMoney('unmasked')[0];
                var product_price = $('#product_price').maskMoney('unmasked')[0];
                $('#product_cost').val(product_cost);
                $('#product_price').val(product_price);
            });
        });
    </script>
@endpush

