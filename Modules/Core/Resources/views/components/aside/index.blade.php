@php
$sidebar = app(\Modules\Core\Entities\AdminSidebar::class);
@endphp

<div x-data="{ open: false }">
    <template x-teleport="#mobile-nav-button">
        <button type="button" x-on:click="open = ! open"
            class="h-full px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500 lg:hidden">
            <span class="sr-only">Open sidebar</span>
            <x-heroicon-o-menu-alt-1 class="h-6 w-6" />
        </button>
    </template>
    <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 flex z-40 lg:hidden" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
        <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-green-700 dark:bg-gray-800">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button"
                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <x-heroicon-o-x class="h-6 w-6 text-white" />
                </button>
            </div>

            <div class="flex-shrink-0 flex items-center px-4">
                {{-- <img class="h-8 w-auto"
                            src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
                            alt="Easywire logo"> --}}
            </div>
            <nav x-on:click.away="open = false" aria-label="Sidebar"
                class="mt-5 flex-shrink-0 h-full divide-y divide-green-800 overflow-y-auto">
                <div class="px-2 space-y-1">
                    @foreach ($sidebar->getItems() as $item)
                        @switch ($item[$sidebar::PROPERTY_TYPE])
                            @case($sidebar::TYPE_ITEM)
                                <x-core::aside.link-mobile href="{{ $item[$sidebar::PROPERTY_LINK] }}"
                                    :active="$item[$sidebar::PROPERTY_ACTIVE]">
                                    <x-dynamic-component :component="$item['icon']" class="mr-4 flex-shrink-0 h-6 w-6" />
                                    {{ $item['title'] }}
                                </x-core::aside.link-mobile>
                            @break

                            @case($sidebar::TYPE_DIVIDER)
                                <x-core::aside.divider :title="$item[$sidebar::PROPERTY_TITLE] ?? ''" />
                            @break
                        @endswitch
                    @endforeach


                </div>
            </nav>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>

</div>

<div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
    <div class="flex flex-col flex-grow bg-green-700 dark:bg-gray-800 pt-5 pb-4 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
            {{-- <img class="h-8 w-auto"
                            src="https://tailwindui.com/img/logos/easywire-logo-green-300-mark-white-text.svg"
                            alt="Easywire logo"> --}}
        </div>
        <nav class="mt-5 flex-1 flex flex-col divide-y divide-green-800 overflow-y-auto" aria-label="Sidebar">
            <div class="px-2 space-y-1">
                @foreach ($sidebar->getItems() as $item)
                    @switch ($item[$sidebar::PROPERTY_TYPE])
                        @case($sidebar::TYPE_ITEM)
                            <x-core::aside.link href="{{ $item[$sidebar::PROPERTY_LINK] }}"
                                :active="$item[$sidebar::PROPERTY_ACTIVE]">
                                <x-dynamic-component :component="$item['icon']" class="mr-4 flex-shrink-0 h-6 w-6" />
                                {{ $item['title'] }}
                            </x-core::aside.link>
                        @break

                        @case($sidebar::TYPE_DIVIDER)
                            <x-core::aside.divider :title="$item[$sidebar::PROPERTY_TITLE] ?? ''" />
                        @break
                    @endswitch
                @endforeach
        </nav>
    </div>
</div>
