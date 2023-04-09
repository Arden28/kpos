<div>
    <form id="deposit-form" wire:submit.prevent="deposit">

        {{-- <div class="modal-body">
            <div wire:loading.flex wire.target="submit" class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div> --}}

        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12">
                <div class="mb-3">
                    <h2>{{ __('Compte sélectionné') }} : {{ $data->account_name }}</h2>
                </div>
            </div>

            <div class="col-lg-12">
              <div class="mb-3">
                <label class="form-label">{{ __('Montant') }} : </label>
                <input type="number" id="amount" placeholder="{{ __("Combien voulez-vous déposer ?") }}" class="form-control" wire:model="amount" >
                @error('amount') <span class="error">{{ $message }}</span> @enderror
              </div>
            </div>

            <div class="col-lg-12">
              <div class="mb-3">
                <label class="form-label">{{ __('Date') }} : </label>
                <input type="date" id="date" class="form-control" wire:model="date" >
                {{-- <input type="number" placeholder="{{ __("Combien y'a-t-il dans la Caisse ?") }}" class="form-control" wire:model="date"> --}}
                @error('date') <span class="error">{{ $message }}</span> @enderror
              </div>
            </div>

            <div class="col-lg-12">
              <div>
                <label class="form-label">{{ __('Remarque') }} : </label>
                <textarea wire:model="note" placeholder="Ecrivez ici, toutes vos remarques ou préoccupations concernant le dépôt." class="form-control" rows="3"></textarea>
                @error('note') <span class="error">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            {{ __('Annuler') }}
          </a>
          <button type="submit" class="btn btn-primary ms-auto" wire:loading.attr="disabled">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            {{ __('Confirmer') }}
          </button>
        </div>
    </form>
</div>

