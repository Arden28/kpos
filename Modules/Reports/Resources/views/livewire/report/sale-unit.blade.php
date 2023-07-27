
<div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="subheader">{{ __('Ventes') }}</div>
          <div class="ms-auto lh-1">

            <span wire:target="getYesterday, getDays, today" wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

            <div class="dropdown">
              <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ _("Aujourd'hui") }}</a>
              <div class="dropdown-menu dropdown-menu-end">
                <button class="dropdown-item active" wire:click.defer="today">{{ __('Aujourd\'hui') }}</button>
                <button class="dropdown-item" wire:target="getYesterday" wire:click.defer="getYesterday">{{ __('Hier') }}</button>
                <a class="dropdown-item" wire:click.defer="getDays({{ 7 }})">{{ __('Dernier 7 jours') }}</a>
                <a class="dropdown-item" wire:click.defer="getDays({{ 30 }})">{{ __('Dernier 30 jours') }}</a>
                <a class="dropdown-item" wire:click.defer="getDays({{ 90 }})">{{ __('Dernier 90 jours') }}</a>
              </div>
            </div>
          </div>
        </div>
        @php
        $html = '<div><ul>';
        foreach ($sales as $sale) {
          $html .= '<li> <p style="font-size: 24px;">' . format_currency($sale->paid_amount) . ' -> '.format_currency($sale->total_amount).'';
        }
        $html .= '</p> </ul></div>';

        @endphp
        <div class="d-flex align-items-baseline">
          <div class="h1 mb-3"> {{ $units }} {{ module('field_of_service') == true ? 'Services' : 'Produits' }}</div>
            {{-- <button type="button" class="btn btn-xxl btn-white" data-bs-toggle="popover" data-bs-title="Produit(s) vendus ..."
                 data-bs-content="{{ $html }}" data-bs-html="true">
                 <i class="bi bi-eye"></i> Info
            </button> --}}
          </div>
          {{-- <div class="ms-auto">
              <span class="text-green d-inline-flex align-items-center lh-1">
              12% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
              </span>
          </div> --}}
        </div>
        <div id="chart-sale-item-bg" class="chart-sm"></div>
      </div>
    </div>
  </div>


@push('page_scripts')
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-sale-item-bg'), {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 40.0,
                sparkline: {
                    enabled: true
                },
                animations: {
                    enabled: true
                },
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: .16,
                type: 'solid'
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "Unité(s)",
                data: @json($data)
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                // type: 'datetime',
                type: 'datetimepicker',
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: @json($date),

            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
@endpush
