@props(['title' => ''])

<div {{ $attributes }}>
    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
        {{ $title }}
    </label>
    <div class="mt-1">
        {{ $slot }}
    </div>
</div>