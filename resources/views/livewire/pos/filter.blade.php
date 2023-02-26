<div>
    <div class="row" style="padding-bottom: 10px;">
        <div class="col-md-7">
            <div class="form-group">
                <label>{{ __('Product Category') }}</label>
                <select wire:model="category" class="form-control">
                    <option value="">{{ __('All Products') }}</option>
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
                    <option value="9">9 {{ __('Products') }}</option>
                    <option value="15">15 {{ __('Products') }}</option>
                    <option value="21">21 {{ __('Products') }}</option>
                    <option value="30">30 {{ __('Products') }}</option>
                    <option value=""> {{ __('All Products') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
