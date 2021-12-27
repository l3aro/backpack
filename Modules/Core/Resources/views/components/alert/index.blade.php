@props(['message', 'type' => 'info'])

@php
$componentName = 'core::alert.' . $type;
@endphp

@if ($message)
    <x-dynamic-component :component="$componentName">
        {{ $message }}
    </x-dynamic-component>
@endif
