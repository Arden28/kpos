@if($data->quantity <= $data->product_stock_alert)
    @can('edit_products')
    <a href="#" class="btn btn-info btn-sm" title="Ce produit est en stock d'alerte. Veuillez en commander auprès de votre fournisseur.">
        <i class="bi bi-arrow-repeat"></i>
    </a>
    @endcan
@endif

@can('edit_products')
<a href="{{ route('products.edit', $data->id) }}" class="btn btn-info btn-sm">
    <i class="bi bi-pencil"></i>
</a>
@endcan
@can('show_products')
<a href="{{ route('products.show', $data->id) }}" class="btn btn-primary btn-sm">
    <i class="bi bi-eye"></i>
</a>
@endcan
@can('delete_products')
<button id="delete" class="btn btn-danger btn-sm" onclick="
    event.preventDefault();
    if (confirm('Are you sure? It will delete the data permanently!')) {
        document.getElementById('destroy{{ $data->id }}').submit()
    }
    ">
    <i class="bi bi-trash"></i>
    <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('products.destroy', $data->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
@endcan
