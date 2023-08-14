<div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div>
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

                <div class="form-group" style="padding-bottom: 12px;">
                    <label for="customer_id">{{ __('Client') }} <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
                                <i class="bi bi-person-plus"></i>
                            </a>
                        </div>
                        <select wire:model="customer_id" id="customer_id" class="form-control">
                            <option value="" selected>{{ __('Sélectionnez un Client') }}</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="text-center">
                            <th class="align-middle">{{ __('Produit') }}</th>
                            <th class="align-middle">{{ __('Prix') }}</th>
                            <th class="align-middle">{{ __('Quantité') }}</th>
                            <th class="align-middle">{{ __('Sous-total') }}</th>
                            <th class="align-middle">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($cart_items->isNotEmpty())
                            @foreach($cart_items as $cart_item)
                                <tr>
                                    <td class="align-middle">
                                        {{ $cart_item->name }} <br>
                                        <span class="badge badge-success">
                                            {{ $cart_item->options->code }}
                                        </span>

                                        @include('livewire.includes.product-cart-modal')
                                        @include('livewire.includes.product-cart-pricing-modal')
                                    </td>

                                    <td class="align-middle">
                                        {{ format_currency($cart_item->price) }}
                                    </td>

                                    <td class="align-middle">
                                        @include('livewire.includes.product-cart-quantity')
                                    </td>

                                    <td class="align-middle">
                                        {{ format_currency($cart_item->qty * $cart_item->price) }}
                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="#" wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                            <i class="bi bi-x-circle font-2xl text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">
                                    <span class="text-danger">
                                        {{ __('Veuillez rechercher et sélectionner un produit !') }}
                                    </span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>{{ __('Taxe') }} ({{ $global_tax }}%)</th>
                                <td>(+) {{ format_currency(Cart::instance($cart_instance)->tax()) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Réduction') }} ({{ $global_discount }}%)</th>
                                <td>(-) {{ format_currency(Cart::instance($cart_instance)->discount()) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Livraison') }}</th>
                                <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                                <td>(+) {{ format_currency($shipping) }}</td>
                            </tr>
                            <tr class="text-primary">
                                <th>{{ __('Grand Total') }}</th>
                                @php
                                    $total_with_shipping = Cart::instance($cart_instance)->total() + (float) $shipping
                                @endphp
                                <th>
                                    (=) {{ format_currency($total_with_shipping) }}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="tax_percentage">{{ __('Taxe') }} (%)</label>
                        <input wire:model.lazy="global_tax" type="number" class="form-control" min="0" max="100" value="{{ $global_tax }}" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="discount_percentage">{{ __('Réduction') }} (%)</label>
                        <input wire:model.lazy="global_discount" type="number" class="form-control" min="0" max="100" value="{{ $global_discount }}" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="shipping_amount">{{ __('Livraison') }}</label>
                        <input wire:model.lazy="shipping" type="number" class="form-control" min="0" value="0" required step="0.01">
                    </div>
                </div>
            </div>

            <div class="form-group d-flex justify-content-center flex-wrap mb-0" style="margin-top: 10px">
                <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger mr-3"><i class="bi bi-x"></i> {{ __('Annuler') }}</button>
                <button wire:loading.attr="disabled" wire:click="proceed" type="button" class="btn btn-pill btn-primary" {{  $total_amount == 0 ? 'disabled' : '' }}><i class="bi bi-check"></i> {{ __('Procéder') }}</button>
            </div>
        </div>
    </div>

    {{--Checkout Modal--}}
    @include('livewire.pos.includes.checkout-modal')
    {{-- @include('livewire.pos.includes.customer-modal') --}}
    @include('people::livewire.includes.customer-modal')

</div>


