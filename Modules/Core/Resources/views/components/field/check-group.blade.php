@props(['description', 'field'])

@php
$field ??= $attributes->whereStartsWith('wire:model')->first() ?? '';
@endphp

<div class="max-w-lg">
    @isset($description)
        <p class="text-sm text-gray-500">{{ $description }}</p>
    @endisset
    <div class="mt-4 space-y-4">
        {{ $slot }}
        <x-core::field.session-error :field="$field" />
    </div>
</div>
