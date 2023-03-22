<div class="btn-group dropleft">
    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a target="_blank" href="{{ route('sales.pos.pdf', $data->sale->id) }}" class="dropdown-item">
            <i class="bi bi-file-earmark-pdf mr-2 text-success" style="line-height: 1;"></i> {{ __('Reçu PDV') }}
        </a>
        @can('access_sale_payments')
            <a href="{{ route('sale-payments.index', $data->sale->id) }}" class="dropdown-item">
                <i class="bi bi-cash-coin mr-2 text-warning" style="line-height: 1;"></i> {{ __('Paiements') }}
            </a>
        @endcan
        @can('access_sale_payments')
            @if($data->sale->due_amount > 0)
            <a href="{{ route('sale-payments.create', $data->sale->id) }}" class="dropdown-item">
                <i class="bi bi-plus-circle-dotted mr-2 text-success" style="line-height: 1;"></i> {{ __('Ajout paiement') }}
            </a>
            @endif
        @endcan
        @can('edit_pos_sales')
            <a href="{{ route('sales.edit', $data->sale->id) }}" class="dropdown-item">
                <i class="bi bi-pencil mr-2 text-primary" style="line-height: 1;"></i> {{ __('Modifier') }}
            </a>
        @endcan
        @can('delete_pos_sales')
            <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Êtes vous sûr(e) de vouloir supprimer définitivement cette vente ?')) {
                document.getElementById('destroy{{ $data->id }}').submit()
                }">
                <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> {{ __('Supprimer') }}
                <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('sales.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                </form>
            </button>
        @endcan
    </div>
</div>
