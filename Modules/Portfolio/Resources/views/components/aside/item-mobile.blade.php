@props(['active' => false])

<a
    {{ $attributes->class(['inline-block border-b-2','border-black text-black/80' => $active,'border-transparent' => !$active]) }}>
    {{ $slot }}
</a>
