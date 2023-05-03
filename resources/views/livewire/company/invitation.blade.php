<div>
    @include('utils.alerts')
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
                                    <button type="submit" wire:target="inviteUser" class="btn btn-primary">
                                        {{ __('Inviter') }}
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
