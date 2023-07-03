<a href="{{ route('product-units.edit', $data->id) }}" class="btn btn-info btn-sm">
    <i class="bi bi-pencil"></i>
</a>
<button id="delete" class="btn btn-danger btn-sm" onclick="
    event.preventDefault();
    if (confirm('Êtes-vous sûre de vouloir supprimer cette unité pour toujours ?!')) {
        document.getElementById('destroy{{ $data->id }}').submit();
    }
    ">
    <i class="bi bi-trash"></i>
    <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('product-units.destroy', $data->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
