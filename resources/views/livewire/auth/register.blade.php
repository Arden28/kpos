<div>

    <form wire:submit.prevent="register">
    @csrf
        <div id="personal-info">
            <div class="hr-text">{{ trans('auth.information.professional') }}</div>

            <div class="mb-3">
            <label class="form-label">{{ trans('auth.name') }}</label>
            <input type="text" placeholder="MASSAMBA Judie" class="form-control"
                    wire:model.defer="name" value="{{ old('name') }}">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
            <label class="form-label">{{ trans('auth.phone.label') }}</label>
            <input type="tel" placeholder="064074926" class="form-control"
                    wire:model.defer="phone" value="{{ old('phone') }}">
                    @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ trans('auth.email.label') }}</label>
                <input type="email" placeholder="massambajudie@koverae.com" class="form-control"
                    wire:model.defer="email" value="{{ old('email') }}">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

        </div>

        <div id="professional-info">
            <div class="hr-text">{{ trans('auth.information.professional') }}</div>

            <div class="mb-3">
                <label class="form-label">{{ trans('auth.company.name') }}</label>
                <input type="text" placeholder="Ex: ETS Maire Reine" class="form-control"
                    wire:model.defer="company_name" value="{{ old('company_name') }}">

                    @error('company_name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ trans('auth.company.activity') }}</label>
                <select class="form-control"
                    wire:model.defer="type">
                    <option value="">{{ trans('auth.company.activities.select') }}</option>
                    <option value="Magasin de v??tements">{{ __('Magasin de v??tements') }}</option>
                    <option value="Magasin de bijoux">{{ __('Magasin de bijoux') }}</option>
                    <option value="D??pots de boissons">{{ __('D??pots de boissons') }}</option>
                    <option value="Magasin d'??lectronique">{{ __("Magasin ??lectronique") }}</option>
                </select>
                @error('type') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ trans('auth.company.size') }}</label>
                <select class="form-control"
                    wire:model.defer="company_size">
                    <option value="">{{ trans('auth.company.sizes.select') }}</option>
                    <option value="-5">< 5 {{ __('employ??s') }}</option>
                    <option value="5+">5 - 20 {{ __('employ??s') }}</option>
                    <option value="20+">20 - 50 {{ __('employ??s') }}</option>
                    <option value="50+">> 50 {{ __('employ??s') }}</option>
                </select>
                @error('company_size') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ trans('auth.company.interest') }}</label>
                <select class="form-control"
                    wire:model="primary_interest">
                    <option value="">{{ trans('auth.company.interests.select') }}</option>
                    <option value="Pour mieux g??rer mes ventes">{{ __('Pour mieux g??rer mes ventes') }}</option>
                    <option value="Pour mieux g??rer mon magasin">{{__('Pour mieux g??rer mon magasin')}}</option>
                    <option value="Je n'ai pas de raison particuli??re">{{ __("Je n'ai pas de raison particuli??re") }}</option>
                </select>
                @error('primary_interest') <span class="error">{{ $message }}</span> @enderror
            </div>

        </div>

        <div id="security-info">
            <div class="hr-text">{{ trans('auth.information.security') }}</div>

            <div class="mb-2">
                <label class="form-label">
                {{ trans('auth.mdp.label') }}
                </label>
                <div class="input-group input-group-flat">
                <input type="password" class="form-control"
                        wire:model="password"placeholder="{{ trans('auth.mdp.placeholder') }}">

                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                </span>
                </div>
            </div>

            <div class="mb-2">
            <label class="form-label">
                {{ trans('auth.mdp.confirm') }}
            </label>
            <div class="input-group input-group-flat">
                <input type="password"  class="form-control"
                    wire:model="password_confirmation" placeholder="{{ trans('auth.mdp.confirm_placeholder') }}">

                <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                </a>
                </span>

            </div>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">{{ trans('auth.register') }}</button>
        </div>


    </form>

</div>
