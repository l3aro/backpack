@props(['title'])

<div class="mx-auto px-4 sm:px-6 lg:px-8">
    @isset($title)
        <h2 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">{{ $title }}</h2>
    @endisset
    <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        {{ $slot }}        
    </div>
</div>
