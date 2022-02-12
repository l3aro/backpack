@props(['title'])

<div class="relative">
    <div class="absolute inset-0 flex items-center" aria-hidden="true">
        <div class="w-full border-t border-green-300"></div>
    </div>
    <div class="mt-6 mb-3 relative flex justify-start">
        <span class="pr-3 bg-green-700 text-sm text-white">
            {{ $title ?? '' }}
        </span>
    </div>
</div>
