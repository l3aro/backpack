@props(['src', 'fancy' => 'preview'])

<div class="h-12 w-12 rounded overflow-hidden bg-gray-100 cursor-pointer">
    @if (!$src)
        <div class="w-full h-full bg-slate-400"></div>
    @else
        <img src="{{ $src }}" alt="Image" class="h-full w-full object-cover"
            data-fancybox="{{ $fancy }}">
    @endif
</div>
