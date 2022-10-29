@props(['name', 'url'])

<div class="relative mr-5 mb-5">
    <a href="{{ $url }}" data-fancybox="gallery">
        <div style="background: url({{ $url }}) no-repeat top left / cover"
            class="w-16 h-16 rounded"></div>
    </a>
    <button {{ $attributes }}
        class="absolute rounded-full bg-gray-50 text-red-400 -right-3 -top-3 p-1 shadow hover:shadow-lg hover:bg-white hover:text-red-600 transition">
        <x-heroicon-s-x-mark class="w-4 h-4" />
    </button>
</div>
