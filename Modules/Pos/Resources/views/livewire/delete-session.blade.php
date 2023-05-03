<div>

    <form  wire:submit.prevent="delete({{ $pos }})">

        <div class="modal-body">

          <div class="row">

            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label">{{ __('Attendu') }} : </label>
                <span class="form-control" >{{ $expected_amount_formatted }}</span>
                {{-- <input type="text" class="form-control" wire:model="expected_amount" value="{{ format_currency($expected_amount) }}" disabled> --}}
              </div>
            </div>

            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label">{{ __('Compté') }} : </label>
                <input type="number" placeholder="{{ __("Combien y'a-t-il dans la Caisse ?") }}" class="form-control border-0 rounded-0 border-bottom" wire:model.debounce.500ms="entered_amount">
                @error('end_amount')
                    <span class="error">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label">{{ __('Ecart') }} : </label>
                <p class="form-control text-green">{{ format_currency($difference) }}</p>
              </div>
            </div>


            <div class="col-lg-12">
              <div>
                <label class="form-label">{{ __('Note de fermeture') }} : </label>
                <textarea wire:model="end_note" placeholder="Ecrivez ici, toutes vos remarques ou préoccupations concernant ce jour !" class="form-control" rows="3"></textarea>
                @error('end_note') <span class="error">{{ $message }}</span> @enderror
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
