<div>
    @if ($data->status == 'Pending')
        <a wire:click.defer="updateStatus({{ 'Ordered' }})" class="dropdown-item">
            <i class="bi bi-truck mr-2 text-info" style="line-height: 1;"></i> {{ __('Commandée') }}
        </a>
    @elseif($data->status == 'Ordered')
        <a wire:click.defer="updateStatus({{ 'Completed' }})" class="dropdown-item">
            <i class="bi bi-check2-circle mr-2 text-success" style="line-height: 1;"></i> {{ __('Livrée') }}
        </a>
    @endif
    <span wire:target="updateStatus" wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
</div>
