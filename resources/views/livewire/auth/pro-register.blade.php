<form wire:submit.prevent="subscribe">
    <div x-data="{currentStep: 1}" x-init="currentStep = {{ $currentStep }}">

        <div x-show="currentStep === 1">

            <div class="hr-text">{{ __('Quel abonnement vous convient le plus ?') }}</div>
            @foreach ($plans as $plan)
            <div class="form-selectgroup-boxes row mb-3">
              <div class="col-lg-12">
                <label class="form-selectgroup-item">
                  <input type="radio" wire:model="selectedPlanId" value="{{ $plan->id }}" name="subscription" class="form-selectgroup-input">
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="form-selectgroup-label-content">
                      <span class="form-selectgroup-title strong mb-1">{{ __($plan->name) }}</span>
                      <span class="d-block text-muted">{{ $plan->price }} {{ $plan->currency }}</span>
                    </span>
                  </span>
                </label>
              </div>

            </div>
            @endforeach

            <div class="form-footer">
              <button type="button" x-on:click="currentStep = 2" class="btn btn-primary w-100">{{ __('Suivant') }}</button>
            </div>

        </div>

        <div x-show="currentStep === 2">

            <div class="hr-text">{{ __('Comment souhaitez-vous payez votre abonnement ?') }}</div>
            <div class="form-selectgroup-boxes row mb-3">
              <div class="col-lg-12">
                <label class="form-selectgroup-item">
                  <input type="radio" wire:model="selectedPaymentMethod" value="mtn_mobile_money" name="payment_method" class="form-selectgroup-input">
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="form-selectgroup-label-content">
                      <span class="form-selectgroup-title strong mb-1">{{ __('Momo Pay') }}</span>
                      <span class="d-block text-muted">{{ __('Payez via MoMo Pay') }}</span>
                    </span>
                  </span>
                </label>
              </div>

              <div class="col-lg-12">
                <label class="form-selectgroup-item">
                  <input type="radio" wire:model="selectedPaymentMethod" value="airtel_money" name="payment_method" class="form-selectgroup-input">
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="form-selectgroup-label-content">
                      <span class="form-selectgroup-title strong mb-1">{{ __('Airtel Money') }}</span>
                      <span class="d-block text-muted">{{ __('Payez via Airtel Money') }}</span>
                    </span>
                  </span>
                </label>
              </div>

            </div>

            <div class="form-footer">
                <button type="button" x-on:click="currentStep = 1" class="btn btn-warning w-100">{{ __('Retour') }}</button>
                <br />
              <button type="button" x-on:click="currentStep = 3" class="btn btn-primary w-100">{{ __('Suivant') }}</button>
            </div>

        </div>

        <div x-show="currentStep === 3">

            <h3>{{ __('Résumé abonnement et moyen de paiement') }}</h3>
            <p>{{ __('Abonnement') }}: {{ $selectedPlanId }}</p>
            <p>{{ __('Moyen de paiement') }}: {{ $selectedPaymentMethod }}</p>

            <div class="form-footer">
                <button type="button" x-on:click="currentStep = 2" class="btn btn-warning w-100">{{ __('Retour') }}</button>
                <br>
              <button type="submit" wire:loading.attr="disabled" class="btn btn-primary w-100">{{ __('Confirmer') }}</button>
            </div>

        </div>
    </div>
</form>
