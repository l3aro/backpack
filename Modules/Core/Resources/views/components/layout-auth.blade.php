<x-core::base-layout>
    <div class="min-h-full">
        <x-core::aside />
        <div class="lg:pl-64 flex flex-col flex-1">
            <div
                class="relative z-10 flex-shrink-0 flex h-16 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 lg:border-none">
                <div id="mobile-nav-button"></div>
                <!-- Search bar -->
                <div class="flex-1 px-4 flex justify-between sm:px-6 lg:mx-auto lg:px-8 z-0">
                    <div></div>
                    <div class="ml-4 flex items-end md:ml-6 pb-2">
                        <livewire:core::misc.switch-language />
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <x-core::dropdown>
                                <x-slot name="trigger">
                                    <x-core::button.secondary id="user-menu-button" aria-expanded="false"
                                        aria-haspopup="true">
                                        <img class="h-8 w-8 rounded-full"
                                            src="{{ auth()->user()->profile_photo_url }}" alt="">
                                        <span
                                            class="hidden ml-3 text-gray-700 dark:text-gray-300 text-sm font-medium lg:block"><span
                                                class="sr-only">Open user menu for
                                            </span>{{ auth()->user()->name }}</span>
                                        <x-heroicon-o-chevron-down
                                            class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" />
                                    </x-core::button.secondary>
                                </x-slot>
                                <x-core::dropdown.link href="{{ route('admin.me.profile.index') }}">Your Profile
                                </x-core::dropdown.link>
                                <x-core::dropdown.link href="#" x-on:click.prevent="$dispatch('logout')">
                                    <livewire:core::auth.logout />
                                </x-core::dropdown.link>
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
