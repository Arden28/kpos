<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">
                    <i class="bi bi-cart-check text-primary"></i> {{ __('Confimez la vente') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="checkout-form" action="{{ route('app.pos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if (session()->has('checkout_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <span>{{ session('checkout_message') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-7">
                            <input type="hidden" value="{{ $pos->account_id }}" name="account_id">
                            <input type="hidden" value="{{ $customer_id }}" name="customer_id">
                            <input type="hidden" value="{{ $global_tax }}" name="tax_percentage">
                            <input type="hidden" value="{{ $global_discount }}" name="discount_percentage">
                            <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="total_amount">{{ __('Montant total') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="total_amount" value="{{ $total_amount }}" readonly required>
                                        {{-- <input id="total_amount" type="text" class="form-control" name="total_amount" value="{{ $total_amount }}" readonly required> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="paid_amount">{{ __('Montant reçu') }} <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="paid_amount" value="{{ $total_amount }}" min="0" step="0.25">
                                        {{-- <input id="paid_amount" type="text" class="form-control" name="paid_amount" value="{{ $total_amount }}"> --}}

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">{{ __('Moyen de paiement') }} <span class="text-danger">*</span></label>
                                <select class="form-control" name="payment_method" id="payment_method" required>
                                    <option value="">{{ __('Sélectionnez un moyen de paiement') }}</option>
                                    <option selected value="Cash">{{ __('Paiement en espèce') }}</option>
                                    <option value="Carte Bancaire">{{ __('Carte Bancaire') }}</option>
                                    <option value="Momo Pay">{{ __('Momo Pay') }}</option>
                                    <option value="Chèque">{{ __('Chèque') }}</option>
                                    <option value="Autre">{{ __('Autre') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="note">{{ __('Note (Si besoin)') }}</label>
                                <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>{{ __('Produits') }}</th>
                                        <td>
                                                <span class="badge badge-success">
                                                    {{ Cart::instance($cart_instance)->count() }}
                                                </span>
                                        </td>
                                    </tr>
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

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Annuler') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Confirmer') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
