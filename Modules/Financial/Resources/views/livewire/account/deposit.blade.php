{{-- <div>
    <form wire:submit.prevent="submit">

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
          <button type="submit" class="btn btn-primary ms-auto">

            {{ __('Confirmer') }}

          </button>
        </div>
    </form>
</div> --}}

