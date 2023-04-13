
@can('delete_account_book')
<button id="delete" class="btn btn-danger btn-sm" style="margin-top: 5px;" onclick="
    event.preventDefault();
    if (confirm('Êtes vous sûr de vouloir supprimer cette transaction définitivement ?')) {
    document.getElementById('destroy{{ $data->id }}').submit();
    }
    ">
    <i class="bi bi-trash"></i> {{ __('Supprimer') }}
    <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('book.destroy', $data->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
@endcan
