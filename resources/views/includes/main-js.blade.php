<script src="{{ mix('js/app.js') }}"></script>
<!-- Libs JS -->
<script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js')}}?1668287865" defer></script>
<script src="{{ asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js')}}?1668287865" defer></script>
<script src="{{ asset('dist/libs/jsvectormap/dist/maps/world.js')}}?1668287865" defer></script>
<script src="{{ asset('dist/libs/jsvectormap/dist/maps/world-merc.js')}}?1668287865" defer></script>

<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js')}}?1668287865" defer></script>
<script src="{{ asset('dist/js/demo.min.js')}}?1668287865" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

@include('sweetalert::alert')

@yield('third_party_scripts')

@livewireScripts

@stack('page_scripts')
