<div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form wire:submit.prevent="generateReport">
                        <div class="row" style="padding-bottom: 12px;">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>{{ __('Date') }} <span class="text-danger">*</span></label>
                                    <input wire:model.defer="date" type="date" class="form-control" name="date">
                                    @error('date')
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

    <div class="row">
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
                            <th>{{ __('Balance Comptable') }}</th>
                            <th>{{ __('Débit') }}</th>
                            <th>{{ __('Crédit') }}</th>
                        </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>
                                    <b>{{ __('Dettes fournisseurs') }}</b>
                                </td>
                                <td></td>
                                <td>{{ format_currency($supplier_debt) }}</td>
                            </tr>

                            <tr>
                                <td>
                                    <b>{{ __('Dettes Clients') }}</b>
                                </td>
                                <td>{{ format_currency($client_debt) }}</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>
                                    <b>{{ __('Soldes du Compte :') }}</b>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>
                                       {{ $account->account_name }}
                                    </td>
                                    <td>{{ format_currency($account->balance) }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <b>{{ __('Total') }}</b>
                                </td>
                                <td>
                                    {{ format_currency($credit) }}
                                </td>
                                <td>
                                    {{ format_currency($debit) }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    {{-- <div @class(['mt-3' => $purchases->hasPages()])>
                        {{ $purchases->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
