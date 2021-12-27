@props(['field', 'height' => '400px'])

@php
$field ??= $attributes->wire('model')->value() ?? '';
@endphp

<div wire:ignore class="w-full">
    <div x-data="{content: @entangle($attributes->wire('model'))}" x-init="
            editor = new Editor({
                el: $el,
                height: '{{ $height }}',
                initialEditType: 'markdown',
                placeholder: '{{ $attributes->has('placeholder') ? $attributes->get('placeholder') : 'Write something cool!' }}',
                {{ $attributes->has('toolbar') ? 'toolbarItems: ' . $attributes->get('toolbar') . ',' : '' }}
            })
            editor.setMarkdown(content)
            editor.on('change', (e) => {
                content = editor.getMarkdown()
            })
        "
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['block w-full shadow-sm sm:text-sm rounded-md', 'border-gray-300 focus:ring-green-500 focus:border-green-500' => !$errors->has($field), 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red-300' => $errors->has($field)]) }}>
    </div>
</div>
<x-core::field.session-error :field="$field" />
