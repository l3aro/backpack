@props(['mode' => ''])

<input type="text" x-data x-init="flatpickr($el, { {{ $mode }} })" {{ $attributes }}
    class="block max-w-lg w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white rounded-md">
