<div class="btn-group dropleft">
    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        @if($data->product_type == 'storable')
            @if($data->product_stock_alert >= $data->quantity)
                <a class="dropdown-item" title="Ce produit est en stock d'alerte. Veuillez en commander auprès de votre fournisseur.">
                    <i class="bi bi-arrow-repeat mr-2 text-warning" style="line-height: 1;"></i> {{ __(' Renouveler') }}
                </a>
            @endif
        @endif

        @can('edit_products')
            <a href="{{ route('products.edit', $data->id) }}" class="dropdown-item">
                <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> {{ __('Modifier') }}
            </a>
        @endcan
        @can('show_products')
            <a href="{{ route('products.show', $data->id) }}" class="dropdown-item">
                <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> {{ __('Voir') }}
            </a>
        @endcan
        @can('delete_products')
            <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Êtes-vous sûr? Cela supprimera définitivement le produit !')) {
                document.getElementById('destroy{{ $data->id }}').submit()
                }">
                <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Supprimer
                <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('products.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                </form>
            </button>
        @endcan
    </div>
</div>
