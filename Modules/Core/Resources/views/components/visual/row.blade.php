@props(['title', 'noBorderBottom', 'size' => 'full', 'collapse' => false])

@php
$width = match ($size) { 'full' => 'w-3/4',  'half' => 'w-1/2',  'small' => 'w-1/4' };
@endphp


<div {{ $attributes->class(['flex -mx-6 px-6']) }}>
    <div class="w-1/4 py-4">
        <h4 class="font-normal text-80">{{ $title }}</h4>
    </div>
    <div class="{{ $width }} py-4 break-words">
        @if ($collapse)
            <div x-data="{ expanded: false }">
                <a class="cursor-pointer font-bold text-blue-600" x-on:click.prevent="expanded = ! expanded">Toggle Content</a>

                <div x-cloak x-show="expanded" x-collapse class="mt-5">
                    {{ $slot }}
                </div>
            </div>
        @else
            {{ $slot }}
        @endif
    </div>
</div>
