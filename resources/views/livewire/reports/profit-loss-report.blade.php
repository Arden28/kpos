<div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="generateReport">
                        <div class="row" style="padding-bottom: 12px;">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Date de début') }} <span class="text-danger">*</span></label>
                                    <input wire:model.defer="start_date" type="date" class="form-control" name="start_date">
                                    @error('start_date')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label>{{ __('Date de fin') }} <span class="text-danger">*</span></label>
                                    <input wire:model.defer="end_date" type="date" class="form-control" name="end_date">
                                    @error('end_date')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <span wire:target="generateReport" wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i wire:target="generateReport" wire:loading.remove class="bi bi-shuffle"></i>
                                {{ __('Filtrer') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 15px;">
        {{-- Sales --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-green p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-receipt font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $sales_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($sales_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small ">{{ $total_sales }} {{ __('Ventes') }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Sale Returns --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-arrow-return-left font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $total_sale_returns >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($sale_returns_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ $total_sale_returns }} {{ __('Ventes annulées') }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Profit --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-trophy font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $profit_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($profit_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ __('Bénéfice') }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Purchases --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-bag font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $purchases_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($purchases_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ $total_purchases }} {{ __('Achats') }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Purchase Returns --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-arrow-return-right font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $purchase_returns_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($purchase_returns_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ $total_purchase_returns }} {{__('Achats Annulés')}}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Expenses --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-wallet2 font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $expenses_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($expenses_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ __('Dépenses') }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Payments Received --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-cash-stack font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $payments_received_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($payments_received_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ __('Paiements reçus') }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Payments Sent --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-purple p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-cash-stack font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $payments_sent_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($payments_sent_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ __('Paiements envoyés') }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Payments Net --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-red p-3 mfe-3 rounded" style="margin-right: 15px;">
                        <i class="bi bi-cash-stack font-2xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary {{ $payments_net_amount >= 0 ? 'text-green' : 'text-red' }}">{{ format_currency($payments_net_amount) }}</div>
                        <div class="text-uppercase font-weight-bold small">{{ __('Paiements Net') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
