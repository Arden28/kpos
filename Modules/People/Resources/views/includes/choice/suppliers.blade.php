
<div class="col-lg-12" style="margin-bottom: 5px;">
    <button type="button" id="show-supplier-form">{{ __('Ajouter un fournisseur') }}</button>
</div>

<div id="supplier-form"  class="col-lg-12" style="display:none; margin-top:5px">
    <div class="form-group">
        <label for="supplier_id">{{ __('Founisseur') }} </label>
        <select name="supplier_id" class="form-control" id="supplier_id">
            <option value="">{{ __('Selectionnez votre fournisseur') }}</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
            @endforeach
        </select>
        @error('supplier_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-lg-12" style="margin-top: 10px">
        <p>Aucun Fournisseur ? Veuillez en ajouter un <a href="{{ route('suppliers.create') }}" target="__blank">ici</a>. Ensuite revenez sur cette page, actualisez. Et le tour est fait !</p>
    </div>

</div>

