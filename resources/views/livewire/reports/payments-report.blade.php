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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Date de fin') }} <span class="text-danger">*</span></label>
                                    <input wire:model.defer="end_date" type="date" class="form-control" name="end_date">
                                    @error('end_date')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 12px;">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Paiements') }}</label>
                                    <select wire:model="payments" class="form-control" name="payments">
                                        <option value="">{{ __('Sélectionnez un Paiements') }}</option>
                                        <option value="sale">{{ __('Ventes') }}</option>
                                        <option value="sale_return">{{ __('Ventes annulées') }}</option>
                                        <option value="purchase">{{ __('Achat') }}</option>
                                        <option value="purchase_return">{{ __('Achat annulés') }}</option>
                                    </select>
                                    @error('payments')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Moyen de paiement') }}</label>
                                    <select wire:model.defer="payment_method" class="form-control" name="payment_method">
                                        <option value="">{{ __('Sélectionnez un moyen de paiement') }}</option>
                                        <option value="Paiement en espèce">{{ __('Paiement en espèce') }}</option>
                                        <option value="Carte Bancaire">{{ __('Carte Bancaire') }}</option>
                                        <option value="Momo Pay">{{ __('Momo Pay') }}</option>
                                        <option value="Chèque">{{ __('Chèque') }}</option>
                                        <option value="Autre">{{ __('Autre') }}</option>
                                    </select>
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

    @if($information->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center mb-0">
                            <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Réference</th>
                                <th>{{ ucwords(str_replace('_', ' ', $payments)) }}</th>
                                <th>Total</th>
                                <th>Moyen de paiement</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($information as $data)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($data->date)->format('d M, Y') }}</td>
                                    <td>{{ $data->reference }}</td>
                                    <td>
                                        @if($payments == 'sale')
                                            {{ $data->sale->reference }}
                                        @elseif($payments == 'purchase')
                                            {{ $data->purchase->reference }}
                                        @elseif($payments == 'sale_return')
                                            {{ $data->saleReturn->reference }}
                                        @elseif($payments == 'purchase_return')
                                            {{ $data->purchaseReturn->reference }}
                                        @endif
                                    </td>
                                    <td>{{ format_currency($data->amount) }}</td>
                                    <td>{{ $data->payment_method }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <span class="text-danger">{{ __('Aucune donnée disponible!') }}</span>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div @class(['mt-3' => $information->hasPages()])>
                            {{ $information->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="alert alert-warning mb-0">
                            {{ __('Aucune donnée disponible!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
