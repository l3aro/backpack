<div>
    @if ($this->shouldShowSwitcher)
        <x-core::dropdown>
            <x-slot name="trigger">
                <x-core::button.secondary id="language-switcher" aria-expanded="false" aria-haspopup="true">
                    {{ Str::upper(app()->getLocale()) }}
                    <x-heroicon-o-chevron-down class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" />
                </x-core::button.secondary>
            </x-slot>
            @foreach ($this->listLocale as $key => $label)
                <x-core::aside.link class="px-5" :active="$key === app()->getLocale()" wire:click.prevent="setLocale('{{ $key }}')">
                    {{ $label }}
                </x-core::aside.link>
            @endforeach
        </x-core::dropdown>
    @endif
</div>
