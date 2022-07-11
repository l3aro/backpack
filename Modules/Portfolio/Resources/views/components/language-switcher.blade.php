@php
$listLocale = config('app.locales', []);
$shouldShowSwitcher = count($listLocale) ? true : false;
@endphp
<div>
    @if ($shouldShowSwitcher)
        <x-portfolio::dropdown>
            <x-slot name="trigger">
                <x-portfolio::button.secondary id="language-switcher" aria-expanded="false" aria-haspopup="true">
                    {{ Str::upper(app()->getLocale()) }}
                    <x-heroicon-o-chevron-down class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" />
                </x-portfolio::button.secondary>
            </x-slot>
            @foreach ($listLocale as $key => $label)
                <x-portfolio::dropdown.link href="{{ route('portfolio.switch-locale', $key) }}" class="px-5"
                    :active="$key === app()->getLocale()">
                    {{ $label }}
                </x-portfolio::dropdown.link>
            @endforeach
        </x-portfolio::dropdown>
    @endif
</div>
