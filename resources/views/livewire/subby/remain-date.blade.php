<div>
    <a type="button" class="btn" >

        {{ __('En Période d\'essai : '.$days.'j restant(s)') }}
    </a>
    <div wire:poll.10s="refreshComponent"></div>
</div>
