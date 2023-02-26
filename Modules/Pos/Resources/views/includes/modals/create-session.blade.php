
<div class="modal modal-blur fade" id="modal-session-{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 wire:loading.flex class="modal-title">New report</h5>
          <h5 class="modal-title">{{ $p->name }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <livewire:pos::create-session  :p="$p"/>

      </div>
    </div>
</div>
