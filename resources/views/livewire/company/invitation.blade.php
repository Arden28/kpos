<div>
    @include('utils.alerts')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <span>{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="bi bi-clipboard-data" style="font-size: 15px;"></i> {{ __('Utilisateurs') }}</h3>
        </div>
        <div class="card-body">

            <form wire:submit.prevent="inviteUser">
                @csrf
                <div class="row">

                    <div class="col-lg-6" style="padding-bottom: 10px">
                        <label for="company_name">{{ __('Inviter de nouveaux utilisateurs') }}</label>
                            <div class="input-group">
                                <input type="email" class="form-control" wire:model="email" placeholder="Saisir une adresse email" required>
                                <div class="input-group-prepend">
                                    {{-- <button type="submit" wire:target="inviteUser" class="btn btn-primary">
                                        {{ __('Inviter') }}
                                    </button> --}}
                                    <button wire:click="inviteUser" wire:loading.attr="disabled" type="button" class="btn btn-primary">
                                        <span wire:loading wire:target="inviteUser" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        <i wire:loading.remove wire:target="inviteUser" class="bi bi-user-add"></i> {{ __('Inviter') }}
                                    </button>
                                </div>
                            </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">

                            <p><i class="bi bi-people"></i> {{ Auth::user()->currentCompany->allUsers()->count() }} {{ __('Utilisateur(s) actif(s)') }}</p>
                            <p style="padding-left: 15px"><a href="{{ route('settings.users') }}"><i class="bi bi-arrow-right"></i> {{ __('Gérer les utilisateurs') }}</a></p>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
