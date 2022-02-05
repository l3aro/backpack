@props(['active'])

<li @class([
    'mb-4 p-0 font-bold hover:text-black transition',
    'text-black' => $active,
])>
    <a {{ $attributes->class(['border-b-2 border-b-black pb-1' => $active]) }}>{{ $slot }}</a>
</li>
