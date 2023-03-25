<form wire:submit.prevent="subscribe">
    <div x-data="{currentStep: 1}" x-init="currentStep = {{ $currentStep }}">

        <div x-show="currentStep === 1">

            <div class="hr-text">{{ __('Quel abonnement vous convient le plus ?') }}</div>

            <div class="form-selectgroup-boxes row mb-3">
                <div class="form-group">
                    <label for="billing-cycle">{{ __('Facturation') }}:</label>
                    <select class="form-control" id="billing-cycle" wire:model="billingCycle">
                        @foreach ($billingCycles as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div wire:loading.flex wire:target="billingCycle" class="col-12 justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
            @foreach ($plans as $plan)
            <div class="form-selectgroup-boxes row mb-3" wire:loading.remove wire:target="billingCycle">

              <div class="col-lg-12">
                <label class="form-selectgroup-item">
                  <input type="radio" wire:model="selectedPlanId" value="{{ $plan->id }}" name="subscription" class="form-selectgroup-input">
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="form-selectgroup-label-content">
                      <span class="form-selectgroup-title strong mb-1">{{ __($plan->name) }}</span>
                      <span class="d-block text-muted">
                        {{-- {{ $billingCycle == 'monthly' ? $plan->price : $plan->price }} --}}
                        {{ $plan->price }} {{ $plan->currency }}
                    </span>
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
                  <input type="radio" wire:model="selectedPaymentMethod" value="visa" name="payment_method" class="form-selectgroup-input">
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="payment payment-provider-visa payment-xs me-2"></span>
                    <span class="form-selectgroup-label-content">
                      <span class="form-selectgroup-title strong mb-1">{{ __('Visa') }}</span>
                      <span class="d-block text-muted">{{ __('Payez via votre carte Visa') }}</span>
                    </span>
                  </span>
                </label>

                <label class="form-selectgroup-item">
                  <input type="radio" wire:model="selectedPaymentMethod" value="mtn_mobile_money" name="payment_method" class="form-selectgroup-input">
                  <span class="form-selectgroup-label d-flex align-items-center p-3">
                    <span class="me-3">
                      <span class="form-selectgroup-check"></span>
                    </span>
                    <span class="payment payment-provider-mtn payment-xs me-2"></span>
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
                    <span class="payment payment-provider-airtel payment-xs me-2"></span>
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
            <p>
                {{ __('Abonnement') }}: {{ $selectedPlanId }}
            </p>
            <p>{{ __('Moyen de paiement') }}: {{ $selectedPaymentMethod }}</p>

            <div class="form-footer">
                <button type="button" x-on:click="currentStep = 2" class="btn btn-warning w-100">{{ __('Retour') }}</button>
                <br>
              <button type="submit" wire:loading.attr="disabled" class="btn btn-primary w-100">{{ __('Confirmer') }}</button>
            </div>

        </div>
    </div>
</form>
