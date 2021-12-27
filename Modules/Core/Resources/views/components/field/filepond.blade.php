@props([
    'preview' => true,
    'previewMaxHeight' => '300',
    'maxFileSize',
    'field',
])

@php
$field ??= $attributes->whereStartsWith('wire:model')->first() ?? '';
@endphp

<div class="max-w-lg" wire:ignore x-data x-init="
    () => {
        const post = FilePond.create($refs.{{ $attributes->get('ref') ?? 'input' }})
        post.setOptions({
            allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
            server: {
                process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $field }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $field }}', filename, load)
                },
            },
            allowImagePreview: {{ $preview ? 'true' : 'false' }},
            imagePreviewMaxHeight: '{{ $previewMaxHeight }}',
            allowFileSizeValidation: {{ isset($maxFileSize) ? 'true' : 'false' }},
            maxFileSize: '{{ $maxFileSize ?? null }}',
        })
    }
">
    <input type="file" x-ref="{{ $attributes->get('ref') ?? 'input' }}" />
    <x-core::field.session-error :field="$field" />
</div>
