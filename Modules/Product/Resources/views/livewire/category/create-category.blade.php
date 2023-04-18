<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submitCategory">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="category_code">{{ __('Code de la Catégorie') }} <span class="text-danger">*</span></label>
                <input class="form-control" type="text" wire:model="category_code" required>
            </div>
            <div class="form-group">
                <label for="category_name">{{ __('Nom de la Catégorie') }} <span class="text-danger">*</span></label>
                <input class="form-control" type="text" wire:model="category_name" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" wire:target="submitCategory" class="btn btn-primary">{{ __('Ajouter') }} <i class="bi bi-check"></i></button>
        </div>
    </form>
</div>
