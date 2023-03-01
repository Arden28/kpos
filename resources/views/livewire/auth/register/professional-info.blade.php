<div>
    <div class="mb-3">
        <label class="form-label">{{ trans('auth.company.name') }}</label>
        <input type="text" placeholder="Ex: ETS Maire Reine" class="form-control @error('company_name') is-invalid @enderror"
            name="company_name" value="{{ old('company_name') }}">
        @error('company_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">{{ trans('auth.company.activity') }}</label>
        <select class="form-control @error('type') is-invalid @enderror"
            name="type">
            <option value="">{{ trans('auth.company.activities.select') }}</option>
            <option value="Magasin de vêtements">{{ __('Magasin de vêtements') }}</option>
            <option value="Magasin de bijoux">{{ __('Magasin de bijoux') }}</option>
            <option value="Dépots de boissons">{{ __('Dépots de boissons') }}</option>
            <option value="Magasin d'électronique">{{ __("Magasin électronique") }}</option>
        </select>
        @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">{{ trans('auth.company.size') }}</label>
        <select class="form-control @error('company_size') is-invalid @enderror"
            name="company_size">
            <option value="">{{ trans('auth.company.sizes.select') }}</option>
            <option value="-5">< 5 {{ __('employés') }}</option>
            <option value="5+">5 - 20 {{ __('employés') }}</option>
            <option value="20+">20 - 50 {{ __('employés') }}</option>
            <option value="50+">> 50 {{ __('employés') }}</option>
        </select>
        @error('company_size')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">{{ trans('auth.company.interest') }}</label>
        <select class="form-control @error('primary_interest') is-invalid @enderror"
            name="primary_interest">
            <option value="">{{ trans('auth.company.interests.select') }}</option>
            <option value="Pour mieux gérer mes ventes">{{ __('Pour mieux gérer mes ventes') }}</option>
            <option value="Pour mieux gérer mon magasin">{{__('Pour mieux gérer mon magasin')}}</option>
            <option value="Je n'ai pas de raison particulière">{{ __("Je n'ai pas de raison particulière") }}</option>
        </select>
        @error('primary_interest')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
