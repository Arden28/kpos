
<div>
    <div class="input-group">
        <input type="text" wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query" placeholder="search" class="form-inline form-control-plaintext border-0 rounded-0 border-bottom border-none no-outline" required>
        
        @if(!empty($query))
        
            @if($search_results->isNotEmpty())
            <div class="search-results">
                <ul class="result-list">
                    @foreach($search_results as $result)
                        {{-- <li class="list-group-item list-group-item-action">
                            <a wire:click="resetQuery" wire:click.prevent="selectProduct({{ $result }})" href="#">
                                {{ $result->category_name }}
                            </a>
                        </li> --}}
                                <li wire:click="resetQuery" wire:click.prevent="selectCategory({{ $result }})"  class="result-item">
                                    {{ $result->category_name }}
                                </li>
                              <!-- Add more result items as needed -->
                    @endforeach
                    @if($search_results->count() >= $how_many)
                        <li class="list-group-item list-group-item-action text-center">
                            <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                {{ __('Plus de résultats') }} <i class="bi bi-arrow-down-circle"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        
            @else
                {{ __('Aucun résultat trouvé') }}....
            @endif
        @endif
    </div>
</div>
