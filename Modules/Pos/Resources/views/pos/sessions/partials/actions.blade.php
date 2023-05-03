
@can('delete_pos_session')
<button id="delete" class="btn btn-danger btn-sm" style="margin-top: 5px;" onclick="
    event.preventDefault();
    if (confirm('Êtes vous sûr de vouloir supprimer cette session définitivement ?')) {
    document.getElementById('destroy{{ $data->id }}').submit();
    }
    ">
    <i class="bi bi-trash"></i> {{ __('Supprimer') }}
    <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('app.pos.session.delete', $data->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
@endcan
