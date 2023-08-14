@extends('layouts.master')

@section('title', __('Ajouter un Produit'))

@section('styles')
{{--
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous"> --}}
    <style>
    /* Add this to your CSS stylesheet */
        .no-outline:focus {
          outline: none;
        }
        .form-control:focus {
          outline: none;
        }

        .image-frame {
            width: 200px;
            height: 200px;
            /* padding-top: 100%; This sets the height to be the same as the width, making it a square */
            /* background-color: #f0f0f0; */
            /* Add any additional styling you want */
        }

        .image-frame img{
            width: 100%;
            height: 100%;
        }
    </style>

<link
    href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css"
    rel="stylesheet"
/>
@endsection

@section('breadcrumb')
<div class="page-header d-print-none">
<div class="container-xl">
    <div class="row g-2 align-items-center">
    <div class="col">
        <h2 class="page-title">
            {{ __('Ajouter un Produit') }}
        </h2>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <livewire:product::product.create />
        </div>
    </div>

    @include('product::livewire.includes.category-modal')

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
                // $('form').append('<input type="hidden" wire:model="document" value="' + response.name + '">');
                $('form').append('<input type="hidden" wire:model="document" value="' + response.name + '">');
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



    <script>
        const supplierForm = document.getElementById('supplier-form');
        const showSupplierFormButton = document.getElementById('show-supplier-form');
        let isSupplierFormVisible = false;
        showSupplierFormButton.addEventListener('click', function() {
            isSupplierFormVisible = !isSupplierFormVisible;
            supplierForm.style.display = isSupplierFormVisible ? 'block' : 'none';
            showSupplierFormButton.innerHTML = isSupplierFormVisible ? 'Cacher' : 'Ajouter un Fournisseur';
        });
    </script>

    <script>
        window.addEventListener('clickFileInput', function () {
            document.getElementById('fileInput').click();
        });
    </script>

@endpush

