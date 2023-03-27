<div>
    <div class="modal modal-blur fade" id="modal-cash" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  wire:submit.prevent="proceed({{ $physical }})">

                <div class="modal-body">

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label class="form-label">{{ __('Action') }} : </label>
                        <select wire:model="action" name="action" id="action" class="form-control">
                            <option value="incoming">{{ __('Cash entrant') }}</option>
                            <option value="outgoing">{{ __('Cash sortant') }}</option>
                            {{-- @foreach ($actions as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach --}}
                        </select>
                        @error('action') <span class="error">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label class="form-label">{{ __('Montant') }} : </label>
                        <input type="number" name="amount" placeholder="{{ __("Montant") }}" class="form-control" wire:model="amount" >
                        @error('amount') <span class="error">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div>
                        <label class="form-label">{{ __('Motif') }} : </label>
                        <textarea wire:model="note" name="note" placeholder="{{ __('Quel est le motif de cette action ?') }}" class="form-control" rows="3"></textarea>
                        @error('note') <span class="error">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    {{ __('Ignorer') }}
                  </a>

                  <button wire:key type="submit" class="btn btn-primary ms-auto">

                    {{ __('Confirmer') }}

                  </button>
                </div>
            </form>

          </div>
        </div>
    </div>
</div>
