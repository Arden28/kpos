@can('edit_account')
<a href="{{ route('account.edit', $data->id) }}" class="btn btn-info btn-sm">
    <i class="bi bi-pencil"></i> {{ __('Modifier') }}
</a>
@endcan

@can('access_account_book')
<a href="{{ route('account.show', $data->id) }}" style="margin-top: 5px;" class="btn btn-yellow btn-sm">
    <i class="bi bi-journal-bookmark-fill"></i> {{ __('Livre de comptes') }}
</a>
@endcan

@can('add_deposit')
<a  data-bs-toggle="modal" data-bs-target="#modal-session-{{ $data->id }}" style="margin-top: 5px;" class="btn btn-green btn-sm">
    <i class="bi bi-cash-stack"></i> {{ __('Dépôt') }}
</a>
@endcan

@can('close_account')
<a  data-bs-toggle="modal" data-bs-target="#modal-session-{{ $data->id }}" style="margin-top: 5px;" class="btn btn-warning btn-sm">
    <i class="bi bi-power"></i> {{ __('Fermer') }}
</a>
@endcan

@can('delete_account')
<button id="delete" class="btn btn-danger btn-sm" style="margin-top: 5px;" onclick="
    event.preventDefault();
    if (confirm('Êtes vous sûr de vouloir supprimer ce compte définitivement ?')) {
    document.getElementById('destroy{{ $data->id }}').submit();
    }
    ">
    <i class="bi bi-trash"></i> {{ __('Supprimer') }}
    <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('account.destroy', $data->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
@endcan


<div class="modal modal-blur fade" id="modal-session-{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Dépôt') }}</h5>
          <h5 class="modal-title">{{ $data->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

            <livewire:financial::account.deposit :data="$data"/>

      </div>
    </div>
</div>

