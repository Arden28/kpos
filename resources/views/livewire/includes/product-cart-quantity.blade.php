<form wire:submit.prevent="updateQuantity('{{ $cart_item->rowId }}', '{{ $cart_item->id }}')">
    <div class="d-flex align-items-center">
        <input wire:model.defer="quantity.{{ $cart_item->id }}" style="min-width: 75px; max-width: 120px;" type="number" class="form-control" value="{{ $cart_item->qty }}" min="0" step="0.25">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check"></i>
            </button>
        </div>
    </div>
</form>



