<div>
    @if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
    @endif
    <div x-data="{currentStep: 1}" x-init="currentStep = {{ $currentStep }}">

        <div x-show="currentStep === 1">
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn w-100">
                        <!-- Download SVG icon from https://icons8.com/icon/set/google/color -->
                        <img src="{{ asset('assets/images/icons/google.svg') }}" width="24px" height="24px" alt="">
                        {{ __('S\'inscrire avec Google') }}
                    </a>
                </div>
                <div class="col-12" style="margin-top: 10px">
                    <a href="#" class="btn w-100">
                        <!-- Download SVG icon from http://https://icons8.com/icon/set/facebook/color -->
                        <img src="{{ asset('assets/images/icons/facebook.svg') }}" width="24px" height="24px" alt="">
                        {{ __("S'inscrire avec Facebook") }}
                    </a>
                </div>
            </div>

            <div class="hr-text">{{__('ou')}}</div>

            <div class="hr-text">{{ __('Informations Personnelles') }}</div>


            <div class="mb-3">
                <label class="form-label">{{ __('Nom(s) & Prénom(s)') }}</label>
                <input  type="text"wire:model="name" name="name" value="{{ old('name') }}" required autocomplete="name" class="form-control" placeholder="Massamba Judie Brelle">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Numéro de Téléphone') }}</label>
                <input  type="tel"wire:model="phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" class="form-control" placeholder="+242064074926">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />

            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Adresse E-mail') }}</label>
                <input  type="email" wire:model="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control" placeholder="massambajudie@mariereine.cg">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            <div class="form-footer">
                <button type="button" wire:click="firstStepSubmit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="firstStepSubmit">{{ __('Suivant') }}</span>
                    <span wire:loading wire:target="firstStepSubmit">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </span>
                </button>
            </div>

        </div>

        <div x-show="currentStep === 2">

            <div class="hr-text">{{ __('Informations Professionnelles') }}</div>

            <div class="mb-3">
                <label class="form-label">{{ __('Nom de votre entreprise') }}</label>
                <input  type="text"wire:model="company_name" company_name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" class="form-control" placeholder="Marie Reine">
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />

            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Reférence de votre entreprise') }}</label>
                <input  type="text" wire:model="company_reference" company_reference="company_reference" value="{{ old('company_reference') }}" required autocomplete="company_reference" class="form-control" placeholder="MR">
                <x-input-error :messages="$errors->get('company_reference')" class="mt-2" />

            </div>


            <div class="mb-3">
                <label class="form-label">{{ __('Quel est votre secteur d\'activité') }}</label>
                <select class="form-control" wire:model="type" name="type">
                    <option>{{ __('Séléctionnez votre domain') }}</option>
                    <option {{ old('type') == 'clothing_store' ? 'selected' : '' }} value="clothing_store">{{ __('Magasin de vêtements') }}</option>
                    <option {{ old('type') == 'jewelry_store' ? 'selected' : '' }} value="jewelry_store">{{ __('Magasin de bijoux') }}</option>
                    <option {{ old('type') == 'beverage_depot' ? 'selected' : '' }} value="beverage_depot">{{ __('Dépots de boissons') }}</option>
                    <option {{ old('type') == 'ciment_depot' ? 'selected' : '' }} value="ciment_depot">{{ __('Dépots de ciments') }}</option>
                    <option {{ old('type') == 'water_depot' ? 'selected' : '' }} value="water_depot">{{ __('Dépots d\'eau') }}</option>
                    <option {{ old('type') == 'electronics_store' ? 'selected' : '' }} value="electronics_store">{{ __("Magasin électronique") }}</option>
                    <option {{ old('type') == 'retail_store' ? 'selected' : '' }} value="retail_store">{{ __('Commerce de vente en détail') }}</option>
                    <option {{ old('type') == 'minimarket' ? 'selected' : '' }} value="minimarket">{{ __('Superette') }}</option>
                    <option {{ old('type') == 'super_market' ? 'selected' : '' }} value="super_market">{{ __('Super Marché') }}</option>
                    <option {{ old('type') == 'store_chain' ? 'selected' : '' }} value="store_chain">{{ __("Chaîne de magasin") }}</option>
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Quelle est la taille de votre entreprise?') }}</label>
                <select class="form-control" wire:model="company_size" name="company_size">
                    <option value="">{{ __('Séléctionnez votre taille') }}</option>
                    <option {{ old('company_size') == '-5' ? 'selected' : '' }} value="-5">< 5 {{ __('employés') }}</option>
                    <option {{ old('company_size') == '5+' ? 'selected' : '' }} value="5+">5 - 20 {{ __('employés') }}</option>
                    <option {{ old('company_size') == '20+' ? 'selected' : '' }} value="20+">20 - 50 {{ __('employés') }}</option>
                    <option {{ old('company_size') == '50+' ? 'selected' : '' }} value="50+">> 50 {{ __('employés') }}</option>
                </select>
                <x-input-error :messages="$errors->get('company_size')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Pourquoi utiliser Koverae ?') }}</label>
                <select class="form-control" wire:model="primary_interest" name="primary_interest">
                    <option value="">{{ __('Faites votre choix') }}</option>
                    <option {{ old('primary_interest') == 'Pour mieux gérer mes ventes' ? 'selected' : '' }} value="Pour mieux gérer mes ventes">{{ __('Pour mieux gérer mes ventes') }}</option>
                    <option {{ old('primary_interest') == 'Pour mieux gérer mon magasin' ? 'selected' : '' }} value="Pour mieux gérer mon magasin">{{__('Pour mieux gérer mon magasin')}}</option>
                    <option {{ old('primary_interest') == 'Je n\'ai pas de raison particulière' ? 'selected' : '' }} value="Je n'ai pas de raison particulière">{{ __("Je n'ai pas de raison particulière") }}</option>
                </select>
                <x-input-error :messages="$errors->get('primary_interest')" class="mt-2" />
            </div>


            <div class="form-footer">
                <button type="button" wire:click="back(1)" class="btn btn-warning w-100">{{ __('Retour') }}</button>
                <br />
                <button style="margin-top: 7px" type="button" wire:click="secondStepSubmit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="secondStepSubmit">{{ __('Suivant') }}</span>
                    <span wire:loading wire:target="secondStepSubmit">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </span>
                </button>
            </div>

        </div>

        <div x-show="currentStep === 3">

            <div class="hr-text">{{ __('Informations de sécurité') }}</div>

            <div class="mb-2">
                <label class="form-label">
                  {{ __('Mot de passe') }}
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control" wire:model="password" name="password" placeholder="{{ __('********') }}">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                  </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-2">
              <label class="form-label">
                {{ __('Confirmer Mot de passe') }}
              </label>
              <div class="input-group input-group-flat">
                <input type="password"  class="form-control" wire:model="password_confirmation"
                    name="password_confirmation" placeholder="{{ __('********') }}">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="form-footer">
                <button type="button" wire:click="back(2)" class="btn btn-warning w-100">{{ __('Retour') }}</button>
                <br >
                <button style="margin-top: 7px" type="button" wire:click="thirdStepSubmit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="thirdStepSubmit">{{ __('Confirmer') }}</span>
                    <span wire:loading wire:target="thirdStepSubmit">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </span>
                </button>
            </div>

        </div>

        <div x-show="currentStep === 4">

            {{-- <div class="hr-text">{{ __('Informations de sécurité') }}</div> --}}

            <p class="text">
                {{ __('Votre compte a bien été créé avec succès ! 🚀👍') }}
            </p>
            <div class="form-footer">
              <button type="submit" wire:click="submitForm({{ 1 }})" wire:loading.attr="disabled" class="btn btn-primary w-100">{{ __('Commencer votre période d\'essaie de 15j') }}</button>
                <br>
                <div class="hr-text">{{ __('ou') }}</div>

              <button type="submit" wire:click="submitForm({{ 0 }})" wire:loading.attr="disabled" class="btn btn-outline-info w-100">{{ __('Plutard') }}</button>
            </div>

        </div>
        <!-- Ajouter une section pour le choix des apps, ainsi proposer ou indiquer la meilleure formule
            adapté à la boîte. Se servir du type de l'entreprise afin de proposer les apps les plus complémentaires et adaptées. --->
    </div>
</div>
