
<div class="col-lg-12" style="margin-bottom: 5px;">
    <button type="button" id="show-supplier-form">{{ __('Ajouter un fournisseur') }}</button>
</div>

<div id="supplier-form"  class="col-lg-6" style="display:none; margin-top:5px; margin-bottom:5px">
    <div class="form-group">
        <label for="supplier_id">{{ __('Founisseur') }} </label>
        <div class="input-group">
            <div class="input-group-prepend">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-supplier">
                    <i class="bi bi-person-plus"></i>
                </a>
            </div>

            <select name="supplier_id" class="form-control" id="supplier_id">
                <option value="" disabled>{{ __('Selectionnez votre fournisseur') }}</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                @endforeach
            </select>
            @error('supplier_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>
    </div>

    {{-- <div class="col-lg-12" style="margin-top: 10px">
        <p>Aucun Fournisseur ? Veuillez en ajouter un <a href="{{ route('suppliers.create') }}" target="__blank">ici</a>. Ensuite revenez sur cette page, actualisez. Et le tour est fait !</p>
    </div> --}}

</div>


{{-- @include('people::livewire.includes.supplier-modal') --}}



