<div>

    <span class="d-none d-sm-inline">
        <button wire:click="exit" class="btn btn-dark">
            <i class="bi bi-box-arrow-up-right"></i>
            {{ __('Backend') }}
        </button>
    </span>

        <button type="button" wire:click="delete({{$pos}})" class="btn btn-primary d-none d-sm-inline-block">
            <i class="bi bi-box-arrow-right"></i>
            {{ __('Fermer') }}
        </button>


    {{-- <form  wire:submit.prevent="delete({{ $pos }})">
        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">{{ __('Date & Heure d\'ouverture') }} :</label>
            <input type="datetime-local" id="date" class="form-control" wire:model="end_date" placeholder="Your report name">
            @error('end_date') <span class="error">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12">
              <div class="mb-3">
                <label class="form-label">{{ __('Trésorerie Caisse') }} : </label>
                <input type="number" placeholder="{{ __("Combien y'a-t-il dans la Caisse ?") }}" class="form-control">
                @error('end_amount') <span class="error">{{ $message }}</span> @enderror
              </div>
            </div>

            <div class="col-lg-12">
              <div>
                <label class="form-label">{{ __('Remarque') }} : </label>
                <textarea wire:model="note" placeholder="Ecrivez ici, toutes vos remarques ou préoccupations concernant ce jour !" class="form-control" rows="3"></textarea>
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
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            {{ __('Démarer') }}
          </button>
        </div>
    </form> --}}
</div>
