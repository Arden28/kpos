
<div class="modal modal-blur fade" id="modal-session-{{ $physical->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $physical->name }}</h5>
          <h5 class="modal-title">
            Total {{ $physical->pos_sales->count() }} commande(s): 0,00 XAF

          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <livewire:pos::delete-session  :pos="$pos" />

      </div>
    </div>
</div>
