<div>
    <div class="row" style="padding-bottom: 10px;">
        <div class="col-md-7">
            <div class="form-group">
                <label>{{ __('Catégorie de Produit') }}</label>
                <select wire:model="category" class="form-control">
                    <option value="">{{ __('Tous les produits') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>{{ __('Product Count') }}</label>
                <select wire:model="showCount" class="form-control">
                    <option value="9">9 {{ __('Produits') }}</option>
                    <option value="15">15 {{ __('Produits') }}</option>
                    <option value="21">21 {{ __('Produits') }}</option>
                    <option value="30">30 {{ __('Produits') }}</option>
                    <option value=""> {{ __('Tous les Produits') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
