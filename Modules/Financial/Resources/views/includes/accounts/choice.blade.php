
<div class="col-lg-12">
    <button type="button" id="show-account-form">{{ __('Connecter un Compte') }}</button>
</div>

<div id="account-form" class="col-lg-12" style="display:none;">
    <div class="form-group">
        <label for="account_id">{{ __('Compte') }} </label>
        <select name="account_id" class="form-control" id="account_id">
            <option value="">{{ __('Selectionnez le compte relié à votre Pdv') }}</option>
            @foreach ($accounts as $account)
                <option value="{{ $account->id }}">{{ $account->account_name }}</option>
            @endforeach
        </select>
        @error('account_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-lg-12" style="margin-top: 10px">
        <p>Aucun Compte de paiement ? Veuillez en créer un <a href="{{ route('account.index') }}">ici</a></p>
    </div>

</div>

