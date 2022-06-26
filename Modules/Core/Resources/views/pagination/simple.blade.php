<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <div></div>
                @else
                    @if (method_exists($paginator, 'getCursorName'))
                        <x-core::button.secondary dusk="previousPage"
                            wire:click="setPage('{{ $paginator->previousCursor()->encode() }}','{{ $paginator->getCursorName() }}')"
                            wire:loading.attr="disabled">
                            {!! __('pagination.previous') !!}
                        </x-core::button.secondary>
                    @else
                        <x-core::button.secondary wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}">
                            {!! __('pagination.previous') !!}
                        </x-core::button.secondary>
                    @endif
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if (method_exists($paginator, 'getCursorName'))
                        <x-core::button.secondary dusk="nextPage"
                            wire:click="setPage('{{ $paginator->nextCursor()->encode() }}','{{ $paginator->getCursorName() }}')"
                            wire:loading.attr="disabled">
                            {!! __('pagination.next') !!}
                        </x-core::button.secondary>
                    @else
                        <x-core::button.secondary wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}">
                            {!! __('pagination.next') !!}
                        </x-core::button.secondary>
                    @endif
                @else
                    <div></div>
                @endif
            </span>
        </nav>
    @endif
</div>
