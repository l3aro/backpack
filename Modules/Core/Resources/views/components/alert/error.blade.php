<div class="rounded-md bg-red-50 p-4" x-data="{ open: true }" x-show="open" x-transition>
    <div class="flex">
        <div class="flex-shrink-0">
            <x-heroicon-s-x-circle class="h-5 w-5 text-red-400" />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-red-800">
                {{ $slot }}
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button type="button" x-on:click="open = false"
                    class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600">
                    <span class="sr-only">Dismiss</span>
                    <x-heroicon-s-x class="h-5 w-5" />
                </button>
            </div>
        </div>
    </div>
</div>
