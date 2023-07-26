
<div class="modal modal-blur fade" id="profit-{{ $physical->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __("Profit d'aujourd'hui") }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @php
            $pos_sales = Auth::user()->currentPos()->getSessionSales(session('pos_session_id'));
        @endphp
        <livewire:pos::widget.profit :sales="$pos_sales" />
      </div>
    </div>
</div>
