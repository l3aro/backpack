@props(['active' => false])

<!-- Current: "bg-green-800 text-white", Default: "text-green-100 hover:text-white hover:bg-green-600" -->
<a {{ $attributes->class(['group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md', 'bg-green-800 text-white' => $active, 'text-green-100 hover:text-white hover:bg-green-600' => !$active]) }}
    aria-current="page">
    {{ $slot }}
</a>
