@props(['field', 'default' => asset('assets/images/avatar-placeholder.png'), 'title' => __('Change')])

@php
$field ??= $attributes->wire('model')->value() ?? '';
@endphp

<div class="flex items-center">
    <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
        <img src="{{ $default }}" alt="Avatar" class="h-full w-full object-cover">
    </span>
    <label
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['cursor-pointer ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500']) }}>
        {{ $title }}
        <input type="file" class="hidden" {{ $attributes->whereStartsWith('wire:model') }}>
    </label>
</div>
<x-core::field.session-error :field="$field" />
