@props([
    'optionComponent' => 'select.option',
    'searchable' => false,
    'multiple' => false,
    'optionKeyLabel' => false,
    'optionKeyValue' => false,
    'label' => '',
    'placeholder' => '',
    'optionValue' => '',
    'optionLabel' => '',
    'icon' => '',
    'readonly' => false,
    'disabled' => false,
])

@php
$field ??= $attributes->wire('model')->value() ?? '';
@endphp

<div x-data="select({
    model:       @entangle($attributes->wire('model')),
    searchable:  @boolean($searchable),
    multiple: @boolean($multiple),
    readonly:    @boolean($readonly),
    disabled:    @boolean($disabled),
    placeholder: '{{ $placeholder }}',
    optionValue: '{{ $optionValue }}',
    optionLabel: '{{ $optionLabel }}',
})" class="relative" {{ $attributes->only('wire:key') }}>
    <div class="relative">
        <x-core::field.input class="cursor-pointer overflow-hidden dark:text-secondary-400" x-ref="select"
            x-on:click="togglePopover" x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
            x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()" x-bind:placeholder="getPlaceholderText()"
            x-bind:value="getValueText()" readonly
            {{ $attributes->whereDoesntStartWith(['wire:model', 'type', 'wire:key']) }}>

            <x-slot name="prepend">
                <div class="absolute left-0 inset-y-0 pl-2 pr-14 w-full flex items-center overflow-hidden cursor-pointer"
                    :class="{ 'pointer-events-none': disabled || readonly }" x-show="multiple"
                    x-on:click="togglePopover">
                    <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                        <span class="inline-flex text-secondary-700 dark:text-secondary-400 text-sm"
                            x-show="selectedOptions.length" x-text="model ? model.length : ''">
                        </span>
                        <template x-for="selected in selectedOptions" :key="`selected.${selected.value}`">
                            <span
                                class="
                                inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium
                                border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700
                                dark:bg-secondary-700 dark:text-secondary-400 dark:border-none
                            ">
                                <span style="max-width: 5rem" class="truncate" x-text="selected.label"></span>

                                <button
                                    class="
                                    shrink-0 h-4 w-4 flex items-center text-secondary-400
                                    justify-center hover:text-secondary-500 focus:outline-none
                                "
                                    x-on:click.stop="unSelect(selected.value)" type="button">
                                    <x-heroicon-s-x-mark class="w-3 h-3" />
                                </button>
                            </span>
                        </template>
                    </div>
                </div>
            </x-slot>

            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 gap-x-2">
                    <button class="focus:outline-none" x-show="!isEmptyModel() && !disabled && !readonly"
                        x-on:click="clearModel" type="button">
                        <x-heroicon-s-x-mark class="w-4 h-4 text-secondary-400 hover:text-negative-400" />
                    </button>

                    <button class="focus:outline-none" x-on:click="togglePopover" type="button">
                        <x-heroicon-s-chevron-up-down class="w-5 h-5" />
                    </button>
                </div>
            </x-slot>
        </x-core::field.input>
    </div>

    <div class="
        absolute w-full mt-1 rounded-lg overflow-hidden shadow-md bg-white z-10 border border-secondary-200
        dark:bg-gray-800 dark:border-secondary-600
    "
        x-show="popover" x-cloak x-on:click.outside="closePopover" x-on:keydown.escape.window="closePopover">
        @if ($searchable)
            <div class="px-2 my-2">
                <x-core::field.input
                    class="
                    focus:shadow-md bg-slate-100 focus:ring-primary-600 focus:border-primary-600
                    border border-secondary-200 dark:border-secondary-600 duration-300
                "
                    x-ref="search" x-model="search"
                    x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
                    x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()" borderless shadowless
                    right-icon="heroicon-o-magnifying-glass" placeholder="Search here" wire:key="select-search">
                </x-core::field.input>
            </div>
        @endif

        <ul class="dark:bg-gray-800 dark:text-gray-300 max-h-60 overflow-y-auto select-none" tabindex="-1" x-ref="optionsContainer"
            x-on:keydown.tab.prevent="$event.shiftKey || getNextFocusable().focus()"
            x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
            x-on:keydown.shift.tab.prevent="getPrevFocusable().focus()"
            x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()">
            {{ $slot }}
        </ul>
    </div>
</div>
<x-core::field.session-error :field="$field" />
