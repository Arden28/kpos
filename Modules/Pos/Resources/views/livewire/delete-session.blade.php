<div>

    {{-- <span class="d-none d-sm-inline">
        <button wire:click="exit" class="btn btn-dark">
            <i class="bi bi-box-arrow-up-right"></i>
            {{ __('Backend') }}
        </button>
    </span>

        <button type="button" wire:click="delete({{$pos}})" class="btn btn-primary d-none d-sm-inline-block">
            <i class="bi bi-box-arrow-right"></i>
            {{ __('Fermer') }}
        </button> --}}


    <form  wire:submit.prevent="delete({{ $pos }})">

        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12">
              <div class="mb-3">
                <label class="form-label">{{ __('Espèce à la fermeture') }} : </label>
                <input type="number" placeholder="{{ __("Combien y'a-t-il dans la Caisse ?") }}" class="form-control" wire:model="end_amount">
                @error('end_amount') <span class="error">{{ $message }}</span> @enderror
              </div>
            </div>

            <div class="col-lg-12">
              <div>
                <label class="form-label">{{ __('Note de fermeture') }} : </label>
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

          <a wire:click="exit" class="btn btn-dark">
              <i wire:loading.remove class="bi bi-box-arrow-up-right"></i>

              <div wire:loading.flex wire:target="exit" class="col-12 content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                  <div class="spinner-border text-primary" role="status">
                      <span class="sr-only"></span>
                  </div>
              </div>
              {{ __('Backend') }}
          </a>

          <button type="submit" class="btn btn-primary ms-auto">

            {{ __('Fermer la session') }}

          </button>
        </div>
    </form>
</div>
