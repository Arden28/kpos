<div>
    {{-- <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"> --}}
        <form id="product-form" wire:submit.prevent="saveProduct" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12" style="padding-top: 10px">
                @include('utils.alerts')
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('Ajouter le produit') }} <i class="bi bi-check"></i></button>
                </div>
            </div>


            <div class="col-lg-12" style="padding-top: 10px">
                <div class="card">
                    <div class="card-body">


                        <input type="hidden" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="company_id" value="{{ Auth::user()->currentCompany->id }}">

                        <div class="row">
                            <div class="col-lg-9 col-sm-8">
                              <div class="mb-3">
                                <label for="product_name"><h4>{{ __('Nom du Produit') }}<span class="text-danger">*</span></h4> </label>
                                <input type="text" style="font-size: 28px; font-weight: 500" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_name" placeholder="{{ __('Bavaria Pomme 33Cl') }}" required value="{{ old('product_name') }}">
                              </div>
                            </div>
                            <div class="col-lg-3 selectable" wire:click="openFileInput">
                                <div class="image-frame">
                                    @if ($document && count($document) > 0)
                                        @foreach ($document as $image)
                                            <img src="{{ $image->temporaryUrl() }}" alt="Selected Image">
                                        @endforeach
                                    @else
                                        <img src="{{ asset('images/fallback_product_image.png') }}" alt="Default Image">
                                    @endif
                                </div>
                            </div>
                            <input type="file" id="fileInput" wire:model="document" accept=".png, .jpg, .jpeg, .gif, .jfif" style="display: none;" multiple>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-12" style="margin-top: -100px;">
                                <div class="mb-3 d-flex align-items-center">
                                    <input type="checkbox" class="form-inline form-checkbox" wire:model="can_be_sold" checked value="{{ true }}">
                                    <p class="mb-0 ml-2" style="margin-left: 7px;">{{ __('Peut être vendu') }}</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-12" style="margin-top: -100px;">
                                <div class="mb-3 d-flex align-items-center">
                                    <input type="checkbox" class="form-inline form-checkbox" wire:model="can_be_purchased" checked value="{{ true }}">
                                    <p class="mb-0 ml-2" style="margin-left: 7px;">{{ __('Peut être acheté') }}</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-12" style="margin-top: -100px;">
                                <div class="mb-3 d-flex align-items-center">
                                    <input type="checkbox" style="font-size: 28px; font-weight: 500" class="form-inline form-checkbox" wire:model="can_be_rented" value="{{ true }}">
                                    <p class="mb-0 ml-2" style="margin-left: 7px;">{{ __('Peut être loué') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" style="padding-top: 10px" style="padding-top: 10px" >
              <div class="card">

                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                      <a href="#tabs-general-7" class="nav-link active" data-bs-toggle="tab">{{ __('Informations Générales') }}</a>
                    </li>
                    <li class="nav-item">
                      <a href="#tabs-sales-7" class="nav-link" data-bs-toggle="tab">{{ __('Ventes') }}</a>
                    </li>
                    {{-- <li class="nav-item ms-auto">
                      <a href="#tabs-settings-7" class="nav-link" title="Settings" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                      </a>
                    </li> --}}
                  </ul>
                </div>

                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-general-7">
                      <div>

                        <div class="row">

                          <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                                <label for="product_code">
                                    <h4>
                                        {{ __('Type de Produit') }}
                                    <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true"
                                     data-bs-content="<p>{{ __('Un produit stockable est un produit dont on gère le stock. L\'application "Inventaire" doit être installée
                                     Un produit consommable est un produit dont le stock n\'est pas géré.
                                     Un service est un produit immateriel que vous fournissez.') }}</p>
                                    ">?</span> :
                                    </h4>
                                </label>
                                <select class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_type" id="product_type" required>
                                    <option value="consumable">{{ __('Consommable') }}</option>
                                    <option value="service">{{ __('Service') }}</option>
                                    <option value="storable" selected>{{ __('Produit stockable') }}</option>
                                </select>
                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-12">
                            <div class="mb-3">
                              <label for="category_id">
                                  <h4>
                                  {{ __('Categorie') }} :
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#categoryCreateModal">
                                      <i class="bi bi-plus"></i> Ajouter
                                  </a>
                                  </h4>
                              </label>
                              <div class="input-group">
                                  <select class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="category_id" id="category_id" required>
                                      <option value="" selected >{{ __('Sélectionnez une Catégorie') }}</option>
                                      @foreach($categories as $category)
                                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                          </div>

                        </div>

                        @if($product_type == 'storable')
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="product_code"><h4>{{ __('Code') }} :</h4> </label>
                                    <input type="text" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_code" value="{{ old('product_code') }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                              <div class="mb-3">
                                <label for="barcode_symbology">
                                    <h4>
                                        {{ __('Symbole Code-barre') }} <span class="text-danger">*</span>
                                    </h4>
                                </label>
                                <select class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_barcode_symbology" id="barcode_symbology" required>
                                    <option value="" selected disabled>{{ __('Choisissez votre symbole de code barre') }}</option>
                                    <option value="C128">Code 128</option>
                                    <option value="C39">Code 39</option>
                                    <option value="UPCA">UPC-A</option>
                                    <option value="UPCE">UPC-E</option>
                                    <option value="EAN13">EAN-13</option><option value="EAN8">EAN-8</option>
                                </select>
                              </div>
                            </div>

                        </div>
                        @endif

                          <div class="row">
                            @include('people::includes.choice.suppliers')
                          </div>


                          @if($can_be_purchased && $can_be_sold)
                            <div class="row">

                                <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product_cost">
                                        <h4>
                                            {{ __('Prix d\'achat / Production') }}
                                        </h4>
                                    </label>
                                    <input type="text" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model.lazy="product_cost" value="{{ old('product_cost') }}">
                                </div>
                                </div>

                                <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="product_price">
                                        <h4>
                                            {{ __('Prix de vente') }} <span class="text-danger">*</span>
                                        </h4>
                                    </label>
                                    <input type="text" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model.lazy="product_price" required value="{{ old('product_price') }}">
                                </div>
                                </div>

                            </div>
                          @elseif($can_be_sold)
                          <div class="row">
                              <div class="col-lg-8">
                              <div class="mb-3">
                                  <label for="product_price">
                                      <h4>
                                          {{ __('Prix de vente') }} <span class="text-danger">*</span>
                                      </h4>
                                  </label>
                                  <input type="text" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_price" required value="{{ old('product_price') }}">
                              </div>
                              </div>
                          </div>
                          @elseif($can_be_purchased)
                          <div class="row">
                              <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="product_cost">
                                        <h4>
                                            {{ __('Prix d\'achat / Production') }}
                                        </h4>
                                    </label>
                                    <input id="product_cost" type="text" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model.lazy="product_cost" value="{{ old('product_cost') }}">
                                </div>
                              </div>
                          </div>
                          @endif

                        <!-- Quantity --->
                        @if($product_type == 'storable')
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_quantity">
                                        <h4>
                                            {{ __('Quantité') }} <span class="text-danger">*</span>
                                        </h4>
                                    </label>
                                    <input type="number" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_quantity" required value="{{ old('product_quantity') }}" min="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_stock_alert">
                                        <h4>
                                            {{ __('Quantité d\'alerte') }} <span class="text-danger">*</span>
                                        </h4>
                                    </label>
                                    <input type="number" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_stock_alert" required value="{{ old('product_stock_alert') }}" min="0" max="100">
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_order_tax">
                                        <h4>
                                            {{ __('Taxe') }} (%)
                                        </h4>
                                    </label>
                                    <input type="number" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_order_tax" value="{{ old('product_order_tax') }}" min="1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_tax_type">
                                        <h4>
                                            {{ __('Type de Taxe') }}
                                        </h4>
                                    </label>
                                    <select class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_tax_type" id="j_type">
                                        <option value="" selected disabled>{{ __('Sélectionnez votre Type de Taxe') }}</option>
                                        <option value="1">{{ __('Exclusif') }}</option>
                                        <option value="2">{{ __('Inclusif') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                        <label for="product_unit">
                                            <h4>
                                                    {{ __('Unité') }}
                                                <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true"
                                                data-bs-content="<p>{{ __('Ce texte sera placé après la quantité de produit. Ex : 20 bouteilles') }}</p>
                                                ">?</span>
                                            </h4>
                                        </label>
                                        <select wire:model="unit_id" id="" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline">
                                            <option value="">{{__('Sélectionnez une unité')}}</option>
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->unit_name }} ( {{ $unit->unit_short_name }} )</option>
                                            @endforeach
                                        </select>
                                    {{-- <input type="text" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" wire:model="product_unit" value="{{ old('product_unit') }}" required> --}}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_note">
                                        <h4>
                                            {{ __('Note') }}
                                        </h4>
                                        </label>
                                    <textarea wire:model="product_note" id="product_note" rows="4 " class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline"></textarea>
                                </div>
                            </div>

                            {{-- <div class="col-12">
                                <hr>
                                <div class="form-group">
                                    <label for="document">
                                        <h4>{{ __('Images du Produit') }} <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ __('Max Files: 3, Max File Size: 1MB, Image Size: 400x400') }}"></i></h4>
                                    </label>
                                    <div class="dropzone d-flex flex-wrap align-items-center justify-content-center" id="document-dropzone" wire:ignore>
                                        <div class="dz-message" data-dz-message>
                                            <i class="bi bi-cloud-arrow-up"></i>
                                        </div>
                                        <div class="fallback">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tabs-sales-7">
                      <br>
                      <br>
                      <div class="row">

                        @if(module('pos'))
                            <div class="col-6">
                                <h3 class="card-header">{{ __('Point de vente') }}</h3>
                            <div class="mb-3">
                                <label for="product_code">{{ __('Disponible dans le PdV') }} : </label>
                                <input type="checkbox" class="form-inline form-checkbox">
                            </div>
                            </div>
                        @endif

                      </div>
                    </div>
                    <div class="tab-pane" id="tabs-settings-7">
                      <h4>Settings tab</h4>
                      <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                        {{-- <div class="card-header">
                            <h2 class="card-title">{{ __('Informations Générales') }}</h2>
                        </div> --}}



        </div>
    </form>
</div>
@push('scripts')
<script>
    Livewire.on('unmaskPrice', function () {
        $('#product_price').val(@this.product_price);
    });

    Livewire.on('unmaskCost', function () {
        $('#product_cost').val(@this.product_cost);
    });
</script>
@endpush
