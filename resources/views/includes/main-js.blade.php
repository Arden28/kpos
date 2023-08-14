<script src="{{ mix('js/app.js') }}"></script>
<!-- Libs JS -->
<script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js')}}?1668287865" defer></script>

<!-- Tabler Core -->
<script src="{{ asset('assets/dist/js/tabler.min.js')}}?1668287865" defer></script>
<script src="{{ asset('assets/dist/js/demo.min.js')}}?1668287865" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
    });
</script>

@include('sweetalert::alert')

@yield('third_party_scripts')

@livewireScripts
@laravelTelInputScripts
{{-- @fcScripts --}}

@stack('page_scripts')
