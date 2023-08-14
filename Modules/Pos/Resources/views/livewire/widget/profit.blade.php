<div>
        <div class="modal-body">

            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center mb-0">
                            <div wire:loading.flex class="col-md-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th>{{ __('') }}</th>
                                <th>{{ __("Par prix d'achat") }}</th>
                                <th>{{ __("Par prix de vente") }}</th>
                            </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>
                                        <b>{{ __("Stock d'ouverture") }}</b>
                                    </td>
                                    <td>{{ format_currency($startPurchaseValue) }}</td>
                                    <td>{{ format_currency($startSaleValue) }}</td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>{{ __("Stock de clôture") }}</b>
                                    </td>
                                    <td>{{ format_currency($endPurchaseValue) }}</td>
                                    <td>{{ format_currency($endSaleValue) }}</td>
                                </tr>

                            </tbody>
                        </table>
                        {{-- <div @class(['mt-3' => $purchases->hasPages()])>
                            {{ $purchases->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <tr>
                                        <th>{{ __("Total des ventes") }}</th>
                                        <td>{{ format_currency($sales->sum(function($pos_sales) {
                                            return $pos_sales->sale->paid_amount;
                                        })) }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Total des achats") }}</th>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __("Total des dépenses") }}</th>
                                        <td>500</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <h3 class="card-header">
                            {{ __('Listes des produits achetés') }}
                        </h3>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
