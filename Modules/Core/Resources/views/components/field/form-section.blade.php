@props(['title', 'description' => ''])

<div {{ $attributes->class(['space-y-6 sm:space-y-5']) }}>
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-50">
            {{ $title }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
            {{ $description }}
        </p>
    </div>

    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
        {{ $slot }}
    </div>
</div>
