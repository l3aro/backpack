<div x-data="{shown: false, timeout: null, message: null}" {{ $attributes }} x-cloak x-show.transition.opacity.out.duration.150ms="shown"
    class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
    <div class="p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                {{ $icon }}
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900" x-text="message"></p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
                <button x-on:click.prevent="shown = false; clearTimeout(timeout)"
                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">Close</span>
                    <x-heroicon-s-x class="h-5 w-5" />
                </button>
            </div>
        </div>
    </div>
</div>
