@props(['title' => ''])

<div {{ $attributes }}>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $title }}
    </label>
    <div class="mt-1">
        {{ $slot }}
    </div>
</div>