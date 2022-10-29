<div class="rounded-md bg-blue-50 p-4" x-data="{ open: true }" x-show="open" x-transition>
    <div class="flex">
        <div class="flex-shrink-0">
            <x-heroicon-s-information-circle class="h-5 w-5 text-blue-400" />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-blue-800">
                {{ $slot }}
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button type="button" x-on:click="open = false"
                    class="inline-flex bg-blue-50 rounded-md p-1.5 text-blue-500 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-50 focus:ring-blue-600">
                    <span class="sr-only">Dismiss</span>
                    <x-heroicon-s-x-mark class="h-5 w-5" />
                </button>
            </div>
        </div>
    </div>
</div>
