@props([
    'readonly' => false,
    'disabled' => false,
    'label' => '',
    'value' => '',
])

<li {{ $attributes->class(['py-2 px-3 focus:outline-none transition-colors ease-in-out duration-50 relative group text-gray-600', 'dark:text-gray-300 cursor-pointer focus:bg-gray-700 focus:text-green-800 hover:text-white' => !($readonly || $disabled), 'opacity-60 cursor-not-allowed' => $disabled])->merge([
    'data-label' => $label,
    'data-value' => $value,
]) }}
    @unless($readonly || $disabled) tabindex="0" x-on:click="select('{{ $value }}')"
    x-on:keydown.enter="select('{{ $value }}')" @endunless
    :class="{
    'font-semibold': isSelected('{{ $value }}'),
    @if (!($readonly || $disabled))
        'hover:bg-red-500': isSelected('{{ $value }}'),
        'hover:bg-green-500': !isSelected('{{ $value }}'),
    @endif
}">
    {!! $label ?? $slot !!}

    <div class="absolute inset-y-0 right-0 flex items-center pr-4" x-show="isSelected('{{ $value }}')">
        <x-heroicon-s-check class="w-5 h-5 text-green-600 group-hover:text-white" />
    </div>
</li>
