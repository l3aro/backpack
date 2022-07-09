@props(['active'])

<li @class([
    'mb-4 p-0 font-bold text-neutral-400 hover:text-black transition',
    'text-black dark:text-white' => $active,
])>
    <a {{ $attributes->class(['border-b-2 border-b-black dark:border-b-white/80 pb-1' => $active]) }}>{{ $slot }}</a>
</li>
