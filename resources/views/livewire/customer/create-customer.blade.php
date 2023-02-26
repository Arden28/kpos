<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('create-customer') }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
            <h5 wire:loading.flex class="modal-title">New report</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">{{ __('Client Name') }}</label>
                <input type="text" class="form-control" name="customer_name" required placeholder="{{ __('Client Name') }}">
            </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Client Email') }}</label>
                            <input type="email" class="form-control" name="customer_email" required placeholder="Customer Email">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Client Phone') }}</label>
                            <input type="tel" class="form-control" name="customer_phone" required placeholder="Customer Phone">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('City') }}</label>
                        <input type="text" class="form-control" name="city" required placeholder="{{ __('Customer City') }}">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Country') }}</label>
                        <input type="text" class="form-control" name="country" required placeholder="{{ __('Customer Country') }}" >
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div>
                        <label class="form-label">{{ __('Address') }}</label>
                        <textarea class="form-control" name="address" required placeholder="{{ __('Customer Address') }}" rows="3"></textarea>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                {{ __('Cancel') }}
            </a>
            {{-- <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                {{ __('Add Customer') }}
            </a> --}}
                <button type="submit" class="btn btn-primary ms-auto">Create Customer</button>
            </div>
        </div>
    </form>
</div>
