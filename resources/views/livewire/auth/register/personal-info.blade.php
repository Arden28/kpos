<div>

    <form wire:submit.prevent="submitPersonal">
        <div class="mb-3">
          <label class="form-label">{{ trans('auth.name') }}</label>
          <input type="text" placeholder="MASSAMBA Judie" class="form-control @error('name') is-invalid @enderror"
               wire:model="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">{{ trans('auth.phone.label') }}</label>
          <input type="tel" placeholder="064074926" class="form-control" @error('phone') is-invalid @enderror"
               wire:model="phone" value="{{ old('phone') }}">
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ trans('auth.email.label') }}</label>
            <input type="email" placeholder="massambajudie@koverae.com" class="form-control" @error('email') is-invalid @enderror"
               wire:model="email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </form>

</div>
