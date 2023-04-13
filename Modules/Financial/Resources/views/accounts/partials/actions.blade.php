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

@can('account_deposit')
<a  data-bs-toggle="modal" data-bs-target="#modal-deposit-{{ $data->id }}" style="margin-top: 5px;" class="btn btn-green btn-sm">
    <i class="bi bi-cash-stack"></i> {{ __('Dépôt') }}
</a>
@endcan

@can('account_withdrawal')
<a  data-bs-toggle="modal" data-bs-target="#modal-withdrawal-{{ $data->id }}" style="margin-top: 5px;" class="btn btn-purple btn-sm">
    <i class="bi bi-wallet2"></i> {{ __('Retrait') }}
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

{{-- Deposit --}}
@include('financial::includes.modals.deposit')

{{-- Withdrawal --}}
@include('financial::includes.modals.withdrawal')

