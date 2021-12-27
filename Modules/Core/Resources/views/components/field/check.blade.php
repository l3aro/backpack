@props(['label'])

<div class="flex items-center">
    <label class="ml-3 block text-sm font-medium text-gray-700">
        <input {{ $attributes->class(['focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300']) }}>
        &nbsp;{{ $label ?? '' }}
    </label>
</div>
