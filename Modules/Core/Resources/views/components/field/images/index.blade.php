@props(['field', 'maxSize' => '8MB'])

@php
$field ??= $attributes->wire('model')->value() ?? '';
@endphp

<div class="max-w-lg border-2 border-gray-300 border-dashed rounded-md transition"
    x-data="{dropping: false, handleDrop(e) { 
            this.dropping = true;
            const files = e.dataTransfer.files;
            if (!files.length) {
                return;
            }
            @this.uploadMultiple('{{ $field }}', files);
        }
    }"
    x-bind:class="dropping ? 'bg-gray-100' : 'bg-white'" x-on:drop.prevent="handleDrop"
    x-on:dragover.prevent="dropping = true" x-on:dragleave="dropping = false">
    <div class="flex justify-center px-2 py-6">
        <div class="space-y-1 text-center">
            <div class="flex text-sm text-gray-600">
                <label
                    class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                    <span>Upload files</span>
                    <input name="file-upload" type="file" class="sr-only" multiple
                        {{ $attributes->whereStartsWith('wire:model') }}>
                </label>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs text-gray-500">
                PNG, JPG, GIF up to {{ $maxSize }}
            </p>
        </div>
    </div>
    <div class="flex justify-start min-h-[70px] max-h-80 p-5 flex-wrap overflow-y-auto">
        {{ $slot ?? '' }}
    </div>
</div>
