<a href="{{ route('app.pos.edit', $data->id) }}" class="btn btn-info btn-sm">
    <i class="bi bi-pencil"></i>
</a>
<button id="delete" class="btn btn-danger btn-sm" onclick="
    event.preventDefault();
    if (confirm('Êtes vous sûr de vouloir Supprimer ce Point de vente ?')) {
        document.getElementById('destroy{{ $data->id }}').submit();
    }
    ">
    <i class="bi bi-trash"></i>
    <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('app.pos.delete-physical', $data->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
