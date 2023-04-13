<div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-0 flex-fill">
                  <div class="col-12 col-lg-12 col-xl-12  d-flex flex-column justify-content-center">
                        <div class="container justify-content-center">
                            <p>{{ __('Vous avez découvert une fonctionnalité premium. Vous devez souscrire à un abonnement ou changer afin d\'acceder à cette fonctionnalité.') }}</p>
                            <div class="form-footer">
                                <button wire:click="start" class="btn btn-primary w-100">
                                    {{ __('Commencer votre essaie gratuit de 30 J') }}
                                </button>
                            </div>
                        </div>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>
</div>
