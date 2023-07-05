<div>

    {{-- @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif --}}

    @if ($msg)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <span>
                    {{ $msg }}
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    @endif


    <form wire:submit.prevent="submit">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="unit_name">{{ __('Nom') }} <span class="text-danger">*</span></label>
                <input class="form-control" type="text" wire:model="unit_name" required>
            </div>
            <div class="form-group">
                <label for="unit_short_name">{{ __('Nom court') }} <span class="text-danger">*</span></label>
                <input class="form-control" type="text" wire:model="unit_short_name" required>
            </div>
            <div class="form-group">
                <label for="is_decimal">{{ __('Autoriser la décimale') }} <span class="text-danger">*</span></label>
                <select wire:model="is_decimal" id="" class="form-control" required>
                    <option>{{ __('Veuillez sélectionner') }}</option>
                    <option value="1">{{ __('Oui') }}</option>
                    <option value="0">{{ __('Non') }}</option>
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="is_multiple"> {{ __("Ajouter comme multiple d'autre unité") }}</label><br>
                <input type="checkbox" id="is_multiple_true" wire:model="is_multiple" value="1" {{ old('is_multiple') ? 'checked' : '' }}>
                <input type="checkbox" id="is_multiple_false" wire:model="is_multiple" value="0" {{ old('is_multiple') ? 'checked' : '' }}>
            </div> --}}
            <a wire:click="$set('is_multiple', true)">{{ __("Ajouter comme multiple d'autre unité") }}</a>
            <a wire:click="$set('is_multiple', false)">Cacher</a>
                @if($is_multiple)
                <div class="form-group">
                    <p>
                        <b style="font-size: 16px;">1 {{ $unit }} =</b> <input type="text" wire:model="value" placeholder="fois l'unité de base">
                        <select class="form-control" wire:model="parent_unit_id" id="">
                            <option value="">{{ __('Sélectionnez une unité de base') }}</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }} ({{ $unit->unit_short_name }})</option>
                            @endforeach

                        </select>
                    </p>
                </div>
                @else
                <p>free</p>
                @endif
        </div>
        <div class="modal-footer">
            <button type="submit" wire:target="submit"  class="btn btn-primary">{{ __('Ajouter') }} <i class="bi bi-check"></i></button>
        </div>
    </form>
</div>
