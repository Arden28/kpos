@if ($data->status == 'Pending')
    <span class="badge bg-info">
        {{-- {{ $data->status }} --}}
        {{ __('En Attente') }}
    </span>
@elseif ($data->status == 'Ordered')
    <span class="badge bg-primary">
        {{-- {{ $data->status }} --}}
        {{ __('En cours') }}
    </span>
@else
    <span class="badge bg-success">
        {{-- {{ $data->status }} --}}
        {{ __('Livrée') }}
    </span>
@endif
