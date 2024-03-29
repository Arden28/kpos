@if(request()->routeIs('crm.supplier*'))
    @can('edit_suppliers')
        <a href="{{ route('suppliers.edit', $data->id) }}" class="btn btn-info btn-sm">
            <i class="bi bi-pencil"></i>
        </a>
    @endcan
    @can('show_suppliers')
        <a href="{{ route('suppliers.show', $data->id) }}" class="btn btn-primary btn-sm">
            <i class="bi bi-eye"></i>
        </a>
    @endcan

@endif
@can('delete_suppliers')
    <button id="delete" class="btn btn-danger btn-sm" onclick="
        event.preventDefault();
        if (confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')) {
        document.getElementById('destroy{{ $data->id }}').submit()
        }
        ">
        <i class="bi bi-trash"></i>
        {{ __('Supprimer') }}
        <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('suppliers.destroy', $data->id) }}" method="POST">
            @csrf
            @method('delete')
        </form>
    </button>
@endcan
