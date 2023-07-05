@if(request()->routeIs('customers*'))
    @can('edit_customers')
        <a href="{{ route('customers.edit', $data->id) }}" class="btn btn-info btn-sm">
            <i class="bi bi-pencil"></i>
        </a>
    @endcan
    @can('show_customers')
        <a href="{{ route('customers.show', $data->id) }}" class="btn btn-primary btn-sm">
            <i class="bi bi-eye"></i>
        </a>
    @endcan
@endif
@can('delete_customers')
    <button id="delete" class="btn btn-danger btn-sm" onclick="
        event.preventDefault();
        if (confirm('Êtes-vous sûr ? Cela va définitivement supprimer ce client!')) {
        document.getElementById('destroy{{ $data->id }}').submit()
        }
        ">
        <i class="bi bi-trash"></i>
        {{ __('Supprimer') }}
        <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('customers.destroy', $data->id) }}" method="POST">
            @csrf
            @method('delete')
        </form>
    </button>
@endcan
