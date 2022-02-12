<x-core::base-layout>
    <div class="min-h-full">
        <x-core::aside />
        <div class="lg:pl-64 flex flex-col flex-1">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
                <div id="mobile-nav-button"></div>
                <!-- Search bar -->
                <div class="flex-1 px-4 flex justify-between sm:px-6 lg:mx-auto lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                                    aria-hidden="true">
                                    <!-- Heroicon name: solid/search -->
                                    <x-heroicon-o-search class="h-5 w-5" />
                                </div>
                                <input id="search-field" name="search-field"
                                    class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm"
                                    placeholder="Search Application (Press Ctrl/Cmd + K)" type="search" x-data
                                    x-on:click="$dispatch('toggle-spotlight')">
                            </div>
                        </form>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <x-core::dropdown>
                                <x-slot name="trigger">
                                    <button type="button"
                                        class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <img class="h-8 w-8 rounded-full"
                                            src="{{ auth()->user()->profile_photo_url }}"
                                            alt="">
                                        <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block"><span
                                                class="sr-only">Open user menu for </span>{{ auth()->user()->name }}</span>
                                        <x-heroicon-o-chevron-down
                                            class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" />
                                    </button>
                                </x-slot>
                                <a href="{{ route('admin.me.profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2" x-data x-on:click.prevent="$dispatch('logout')">
                                    <livewire:core::auth.logout />
                                </a>
                            </x-core::dropdown>

                        </div>
                    </div>
                </div>
            </div>
            <main class="flex-1 pb-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-core::base-layout>
