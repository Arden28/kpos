<div>
    <h1>Onboarding</h1>
    <p>Welcome to the onboarding process!</p>
    <button type="button" data-bs-toggle="modal" data-bs-target="#onboardingModal">Start Onboarding</button>
</div>

<!-- Onboarding Modal -->
<div class="modal fade" id="onboardingModal" tabindex="-1" aria-labelledby="onboardingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content swiper-container">
            <div class="swiper-wrapper">
                @foreach($steps as $index => $step)
                <div class="swiper-slide {{ $modalClasses[$index] }}">
                    <h2>Step {{ $index + 1 }}</h2>
                    <p>{{ $step }}</p>
                    <div class="d-flex justify-content-between">
                        @if($index == 0)
                            <button class="btn btn-primary .swiper-button-prev" wire:click="previousStep">Previous</button>
                        @endif
                        @if($index < count($steps) - 1)
                            <button class="btn btn-primary .swiper-button-next" wire:click="nextStep">Next</button>
                        @else
                            <button class="btn btn-primary" data-bs-dismiss="modal">Finish</button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>