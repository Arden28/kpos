@if ($data->status == 'Pending')
    <span class="badge badge-info">
        {{-- {{ $data->status }} --}}
        {{ __('En Attente') }}
    </span>
@elseif ($data->status == 'Shipped')
    <span class="badge badge-primary">
        {{-- {{ $data->status }} --}}
        {{ __('Livré') }}
    </span>
@elseif ($data->status == 'Completed')
    <span class="badge badge-primary">
        {{-- {{ $data->status }} --}}
        {{ __('Complété') }}
    </span>
@else
    <span class="badge badge-success">
        {{ $data->status }}
    </span>
@endif
