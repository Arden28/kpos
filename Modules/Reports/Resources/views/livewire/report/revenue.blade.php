
<div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="subheader">Revenue</div>
          <div class="ms-auto lh-1">
              <div class="dropdown">
                <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ _("Aujourd'hui") }}</a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item active" href="#">{{ __('Aujourd\'hui') }}</a>
                  <a class="dropdown-item" href="#">{{ __('Dernier 7 jours') }}</a>
                  <a class="dropdown-item" href="#">{{ __('Dernier 30 jours') }}</a>
                  <a class="dropdown-item" href="#">{{ __('Dernier 90 jours') }}</a>
                </div>
              </div>
          </div>
        </div>
        <div class="d-flex align-items-baseline">
          <div class="h1 mb-0 me-2">{{ format_currency($revenue) }}</div>
          {{-- <div class="me-auto">
            <span class="text-green d-inline-flex align-items-center lh-1">
              8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
            </span>
          </div> --}}
        </div>
      </div>
      <div id="chart-revenue-bg" class="chart-sm"></div>
    </div>
  </div>

@push('page_scripts')
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
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
                name: "Profits",

                data: @json($data),
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
            labels:
            [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
@endpush