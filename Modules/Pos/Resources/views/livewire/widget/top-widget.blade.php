<div>
    {{-- <a class="btn btn-primary d-none d-sm-inline-block" wire:click="openNewWindow">

        <i class="bi bi-arrow-clockwise"></i>
        {{ __('Ouvrir') }}
    </a>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('openNewWindow', function () {
                var newWindow = window.open('https://www.dashboard.koverae.com/sales/pos/pdf/443', '_blank', 'width=500,height=500');
                // Optionally, you can set the URL of the new window using newWindow.location.href = 'YOUR_URL';
            });
        });
    </script> --}}

    <a class="btn btn-primary d-none d-sm-inline-block" wire:click="refreshPage">

        <i class="bi bi-arrow-clockwise"></i>
        {{ __('Actualiser') }}
    </a>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('refreshPage', function () {
                location.reload();
            });
        });
    </script>
</div>
