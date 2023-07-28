@if ($data->status == 'Pending')
    <span class="badge badge-info">
        {{ __('En attente') }}
    </span>
@else
    <span class="badge badge-success">
        {{ $data->status }}
    </span>
@endif
