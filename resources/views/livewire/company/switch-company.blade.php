<div>

    <button type="button" wire:click="switchToCompany" class="list-group-item-actions">
        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
        <i class="bi bi-broadcast-pin mr-1 text-primary"></i>
    </button>

    {{-- <form wire:submit.prevent="switchToCompany">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-success"></div>
        <div class="modal-body text-center py-4">
          <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
          <h3>{{ __('Passer à') }} {{ $company_info->company_name }} ? {{ $company_info->company_id }}</h3>
          <div class="text-muted">
                {{ __("En changeant d'entreprise, vous serez déconnecté de celle-ci.") }}
          </div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                  {{ __('Cancel') }}
                </a></div>
              <div class="col">
                <button type="submit" class="btn btn-success w-100">
                  {{ __('Changer') }}
                </button></div>
            </div>
          </div>
        </div>
    </form> --}}
</div>
