<div>
    <form wire:submit.prevent="subscribe">
        <div x-data="{currentStep: 1}" x-init="currentStep = {{ $currentStep }}">

            <div x-show="currentStep === 1">

                <div class="hr-text">{{ __('Informations Personnelles') }}</div>

                <livewire:auth.register.personal-info :current="$currentStep"/>

                <div class="form-footer">
                    <button type="button" x-on:click="currentStep = 2" class="btn btn-primary w-100">{{ __('Suivant') }}</button>
                </div>

            </div>

            <div x-show="currentStep === 2">

                <div class="hr-text">{{ __('Informations Professionnelles') }}</div>

                <livewire:auth.register.professional-info />

                <div class="form-footer">
                    <button type="button" x-on:click="currentStep = 1" class="btn btn-warning w-100">{{ __('Retour') }}</button>
                    <br />
                    <button type="button" x-on:click="currentStep = 3" class="btn btn-primary w-100">{{ __('Suivant') }}</button>
                </div>

            </div>

            <div x-show="currentStep === 3">

                <div class="hr-text">{{ __('Informations de Sécurité') }}</div>

                <livewire:auth.register.security-info />

                <div class="form-footer">
                    <button type="button" x-on:click="currentStep = 2" class="btn btn-warning w-100">{{ __('Retour') }}</button>
                    <br />
                    <button type="button" x-on:click="currentStep = 2" class="btn btn-primary w-100">{{ __('Suivant') }}</button>
                </div>

            </div>
        </div>
</div>
