<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form  wire:submit.prevent="submit">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Ajouter une nouvelle devise') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="currency_name">{{ __('Nom de la Devise') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="currency_name" placeholder="Ex: Franc CFA" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="code">{{ __('Code de la Devise') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code" placeholder="FCFA" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="symbol">{{ __('Symbole') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="symbol" placeholder="XAF" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="thousand_separator">Thousand Separator <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="thousand_separator" placeholder="Ex: ." required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="decimal_separator">Decimal Separator <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="decimal_separator" placeholder="Ex: ," required>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                {{ __('Cancel') }}
            </a>
                <button type="submit" class="btn btn-primary ms-auto">{{ __('Ajouter') }}</button>
            </div>
        </div>
    </form>
</div>
