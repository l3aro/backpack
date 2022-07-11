@props(['href'])

@isset($href)
    <a href="{{ $href }}"
        {{ $attributes->class(['dark:bg-zinc-800 dark:text-zinc-200 dark:border-zinc-700 dark:hover:border-zinc-500 items-center inline-flex justify-center py-2 px-4 border border-zinc-300 shadow-sm text-sm font-medium rounded-md text-zinc-700 bg-white hover:text-zinc-800 hover:bg-zinc-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 active:text-zinc-800 active:bg-zinc-50 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->class(['wire:loading.attr' => 'disabled', 'dark:bg-zinc-800 dark:text-zinc-200 dark:border-zinc-700 dark:hover:border-zinc-500 items-center inline-flex justify-center py-2 px-4 border border-zinc-300 shadow-sm text-sm font-medium rounded-md text-zinc-700 bg-white hover:text-zinc-800 hover:bg-zinc-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 active:text-zinc-800 active:bg-zinc-50 disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endisset
