@props(['field', 'disabled' => false, 'hasError' => false])

@php
$field ??= $attributes->wire('model')->value() ?? '';
@endphp

<div class="@if ($disabled) opacity-60 @endif">
    <div class="relative">
        {{ $prepend ?? '' }}
        <input
            {{ $attributes->merge(['type' => 'text', 'autocomplete' => 'off'])->class(['block w-full shadow-sm sm:text-sm rounded-md', 'border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white' => !$errors->has($field), 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red-300' => $errors->has($field)]) }}>

        @if (isset($suffix) || isset($rightIcon))
            <div
                class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none
                {{ $hasError ? 'text-negative-500' : 'text-secondary-400' }}">
                @if (isset($rightIcon))
                    <x-dynamic-component :component="$rightIcon" class="h-5 w-5" />
                @elseif (isset($suffix))
                    <span class="pr-1 flex items-center justify-center">
                        {{ $suffix }}
                    </span>
                @endif
            </div>
        @endif
        {{ $append ?? '' }}
    </div>

    <x-core::field.session-error :field="$field" />
</div>
