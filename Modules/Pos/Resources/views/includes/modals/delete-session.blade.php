
<div class="modal modal-blur fade" id="modal-session-{{ $physical->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $physical->name }}</h5>
            @php
                $pos_sales = Auth::user()->currentPos()->getSessionSales(session('pos_session_id'));

                // $sales = Auth::user()->currentPos()->getSessionCashTransactions(session('pos_session_id'));
            @endphp
          <h5 class="modal-title">
            Total {{ $pos_sales->count() }} commande(s): {{ format_currency($pos_sales->sum(function($pos_sales) {
                return $pos_sales->sale->paid_amount;
            }) )
            }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- @foreach ($sales as $sale)
            <p>{{ $sale->paid_amount }}</p>
        @endforeach --}}
        @if($pos)
        <livewire:pos::delete-session :physical="$physical" :pos="$pos" :sales="$pos_sales"/>
        @endif

      </div>
    </div>
</div>
