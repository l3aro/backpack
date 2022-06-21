@props(['href'])

@isset($href)
    <a href="{{ $href }}"
        {{ $attributes->class(['dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 dark:hover:border-gray-500 items-center inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->class(['wire:loading.attr' => 'disabled', 'dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 dark:hover:border-gray-500 items-center inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endisset
