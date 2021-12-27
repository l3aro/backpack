@props(['title', 'noBorderBottom', 'size' => 'full'])

@php
$width = match ($size) { 'full' => 'w-3/4',  'half' => 'w-1/2',  'small' => 'w-1/4' };
@endphp


<div {{ $attributes->class(['flex -mx-6 px-6', 'border-b border-40' => !isset($noBorderBottom)]) }}>
    <div class="w-1/4 py-4">
        <h4 class="font-normal text-80">{{ $title }}</h4>
    </div>
    <div class="{{ $width }} py-4 break-words">
        {{ $slot }}
    </div>
</div>
