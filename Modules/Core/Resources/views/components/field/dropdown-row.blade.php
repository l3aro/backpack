@props(['title' => ''])

<div {{ $attributes }}>
    <label class="block text-sm font-medium text-gray-700">
        {{ $title }}
    </label>
    <div class="mt-1">
        {{ $slot }}
    </div>
</div>