<div wire:ignore>
    <input x-data="{tags: @entangle($attributes->wire('model')), tagify: null}" x-init="tagify = new Tagify($el);console.log(Alpine.raw(tags))"
        x-on:change="tags = tagify.value.map(item => item.value)"
        {{ $attributes->class(['dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-green-500 focus:border-green-500']) }} />
</div>
