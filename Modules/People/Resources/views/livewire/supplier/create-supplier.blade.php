<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form  wire:submit.prevent="submitSupplier">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Ajouter un nouveau Fournisseur') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">{{ __('Nom du Fournisseur') }}</label>
                <input type="text" class="form-control" wire:model="supplier_name" required placeholder="{{ __('Ex: Marie Reine SA') }}">
                @error('supplier_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Email du Fournisseur') }}</label>
                            <input type="email" class="form-control" wire:model="supplier_email" required placeholder="Email">
                            @error('supplier_email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Numéro de téléphone du Fournisseur') }}</label>
                            <input type="tel" class="form-control" wire:model="supplier_phone" required placeholder="Téléphone">
                            @error('supplier_phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Ville') }}</label>
                        <input type="text" class="form-control" wire:model="city" required placeholder="{{ __('Ville') }}">
                        @error('city') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Pays') }}</label>
                        <input type="text" class="form-control" wire:model="country" required placeholder="{{ __('Pays') }}" >
                        @error('country') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div>
                        <label class="form-label">{{ __('Adresse') }}</label>
                        <textarea class="form-control" wire:model="address" placeholder="{{ __('Adresse') }}" rows="3"></textarea>
                        @error('address') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                {{ __('Annuler') }}
            </a>
                <button type="submit" wire:target="submitSupplier"  class="btn btn-primary ms-auto">{{ __('Ajouter') }}</button>
            </div>
        </div>
    </form>
</div>
