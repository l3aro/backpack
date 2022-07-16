@props(['field', 'height' => '400px'])

@php
$field ??= $attributes->wire('model')->value() ?? '';
@endphp

<div wire:ignore class="w-full">
    <textarea x-data="{ content: @entangle($attributes->wire('model')), editor: null, id: $id('markdown-editor') }" x-init="editor = new SimpleMDE({
        element: $el,
        initialValue: content,
        uploadImage: true,
        imageUploadEndpoint: '{{ route('admin.upload-image') }}',
        imageCSRFName: '_token',
        imageCSRFToken: '{{ csrf_token() }}',
        imagePathAbsolute: true,
        previewRender: function(plainText) { // Async method
            return `<div class='prose'>${markdownParse(plainText)}</div>`;
        },
        placeholder: '{{ $attributes->has('placeholder') ? $attributes->get('placeholder') : 'Write something cool!' }}',
        {{ $attributes->has('toolbar') ? 'toolbar: ' . $attributes->get('toolbar') . ',' : '' }}
    })
    editor.codemirror.on('change', (e) => {
        content = editor.value()
    })
    $watch('content', function(newValue) {
        if (newValue === '') {
            editor.value('')
        }
    })"
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['block w-full shadow-sm sm:text-sm rounded-md', 'border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white' => !$errors->has($field), 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red-300' => $errors->has($field)]) }}></textarea>
</div>
<x-core::field.session-error :field="$field" />
