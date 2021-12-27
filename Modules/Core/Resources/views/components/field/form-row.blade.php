@props(['title', 'required' => false])

<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        {{ $title }}
        @if ($required)
            <span class="text-red-600">*</span>
        @endif
    </label>
    <div {{ $attributes->class("mt-1 sm:mt-0 sm:col-span-2 max-w-lg") }}>
        {{ $slot }}
    </div>
</div>
