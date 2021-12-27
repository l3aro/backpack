@props(['align' => 'right', 'width' => 'w-48', 'contentClasses' => 'py-1 bg-white'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        $placement = 'bottom-start';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        $placement = 'top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        $placement = 'bottom-end';
        break;
}
@endphp

<div x-data="{ open: false }" x-on:click.outside="open = false" x-on:close.stop="open = false" x-init="
        createPopper($el, $refs.popper, {
            placement: '{{ $placement }}',
        })
    ">
    <div x-on:click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-ref="popper" x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 pt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
        x-cloak x-on:click.outside="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $slot }}
        </div>
    </div>
</div>
