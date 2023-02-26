    <form wire:submit.prevent="register" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="tel" wire:model.lazy="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="phone">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" wire:model.lazy="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="password_confirmation">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" wire:model.lazy="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" placeholder="company_name">
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" wire:model.lazy="domain" class="form-control @error('domain') is-invalid @enderror" id="domain" name="domain" placeholder="domain">
            @error('domain')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" wire:click="store">Register</button>
        </div>
