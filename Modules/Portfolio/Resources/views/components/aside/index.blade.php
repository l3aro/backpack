@php
$sidebar = app(\Modules\Portfolio\Enums\AsideEnum::class);
@endphp

<div class="relative lg:hidden mx-auto px-6 flex">
    <div x-data="{showMenu: false}" class="flex items-center justify-end">
        <!-- menu button -->
        <button x-on:click="showMenu = true" class="fixed top-0 left-0 mt-8 ml-6 z-10">
            <x-fas-bars class="w-8 h-8 text-black/80" />
        </button>

        <div x-show="showMenu" x-trap.inert.noscroll="showMenu" class="fixed inset-0 w-screen h-full bg-white z-30"
            x-cloak>
            <button x-on:click="showMenu = false" class="z-20 absolute top-0 left-0 mt-8 ml-6">
                <x-fas-times class="w-8 h-8 text-black/80" />
            </button>
            <div class="h-full mx-auto px-6 py-8 relative z-10 flex flex-col items-center justify-center text-2xl uppercase font-bold tracking-widest space-y-6"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-x-10" x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-10"
                x-show="showMenu">
                @foreach ($sidebar->getItems() as $item)
                    <x-portfolio::aside.item-mobile href="{{ $item[$sidebar::PROPERTY_LINK] }}"
                        :active="$item[$sidebar::PROPERTY_ACTIVE]">
                        {{ $item[$sidebar::PROPERTY_TITLE] }}
                    </x-portfolio::aside.item-mobile>
                @endforeach
            </div>
            <div class="absolute bottom-10 right-6 left-6 text-black/80">
                <ul class="flex items-center justify-center" x-show="showMenu"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-10"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-10">
                    @include('portfolio::layouts.social')
                </ul>
            </div>
            <div class="absolute inset-0 w-screen h-full bg-black/10 bg-opacity-20"></div>
        </div>
    </div>

    {{-- <div class="text-white text-[0.6rem] md:tracking-widest text-center mt-2 col-span-3">
        {{ setting('header_slogan') }}
    </div> --}}
</div>
<aside
    class="text-center h-screen hidden lg:block lg:fixed w-full lg:w-1/5 p-11 top-0 bottom-0 left-0 overflow-y-auto z-20 bg-black/10">
    <a href="/">
        <h1 class="mb-10 w-full font-black text-4xl text-black/80">
            baro<span class="text-neutral-400">.</span>
        </h1>
    </a>
    <nav role="navigation">
        <ul class="m-0 p-0">
            @foreach ($sidebar->getItems() as $item)
                <x-portfolio::aside.item href="{{ $item[$sidebar::PROPERTY_LINK] }}"
                    :active="$item[$sidebar::PROPERTY_ACTIVE]">
                    {{ $item[$sidebar::PROPERTY_TITLE] }}
                </x-portfolio::aside.item>
            @endforeach
        </ul>
    </nav>
    <div class="absolute bottom-10 right-6 left-6 text-black/80">
        <ul class="flex items-center justify-center">
            @include('portfolio::layouts.social')
        </ul>
    </div>
</aside>
