@props(['active' => false])

<a
    {{ $attributes->class(['inline-block border-b-2', 'border-black dark:border-white text-black/80 dark:text-white' => $active, 'border-transparent' => !$active]) }}>
    {{ $slot }}
</a>
