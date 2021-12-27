@props(['mode' => ''])

<input type="text" x-data x-init="flatpickr($el, { {{ $mode }} })" {{ $attributes }}
    class="block max-w-lg w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm border-gray-300 rounded-md">