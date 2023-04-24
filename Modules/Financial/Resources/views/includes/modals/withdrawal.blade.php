
<div class="modal modal-blur fade" id="modal-withdrawal-{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Retrait de Compte') }}</h5>
          <h5 class="modal-title">{{ $data->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="POST" action="{{ route('book.withdrawal', $data->id) }}">
            @csrf
            <div class="modal-body">
            <div class="row">

                <div class="col-lg-12">
                    <div class="mb-3">
                        <h2>{{ __('Compte sélectionné') }} : {{ $data->account_name }}</h2>
                    </div>
                </div>
                <input type="hidden" value="{{ $data->id }}" name="account_id">
                <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label">{{ __('Montant') }} : </label>
                    <input type="number" id="amount" placeholder="{{ __("Combien voulez-vous retiré ?") }}" class="form-control" name="amount" >
                    @error('amount') <span class="error">{{ $message }}</span> @enderror
                </div>
                </div>

                <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label">{{ __('Date') }} : </label>
                    <input type="date" class="form-control" name="date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    @error('date') <span class="error">{{ $message }}</span> @enderror
                </div>
                </div>

                <div class="col-lg-12">
                <div>
                    <label class="form-label">{{ __('Remarque') }} : </label>
                    <textarea name="note" placeholder="Ecrivez ici, toutes vos remarques ou préoccupations concernant le retrait." class="form-control" rows="3"></textarea>
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

      </div>
    </div>
</div>
