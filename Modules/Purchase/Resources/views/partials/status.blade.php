@if ($data->status == 'Pending')
    <span class="badge badge-info">
        {{-- {{ $data->status }} --}}
        {{ __('En Attente') }}
    </span>
@elseif ($data->status == 'Ordered')
    <span class="badge badge-primary">
        {{ $data->status }}
        {{ __('Taité') }}
    </span>
@else
    <span class="badge badge-success">
        {{ $data->status }}
    </span>
@endif
