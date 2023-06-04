@if ($data->payment_status == 'Partial')
    <span class="badge bg-warning">
        {{-- {{ $data->payment_status }} --}}
        {{ __('Partielle') }}
    </span>
@elseif ($data->payment_status == 'Paid')
    <span class="badge bg-success">
        {{-- {{ $data->payment_status }} --}}
        {{ __('Payée') }}
    </span>
@else
    <span class="badge bg-danger">
        {{-- {{ $data->payment_status }} --}}
        {{ __('Non Payée') }}
    </span>
@endif
