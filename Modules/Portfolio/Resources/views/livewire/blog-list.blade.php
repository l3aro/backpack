<div class="min-h-screen bg-gray-100">
    <x-slot name="metaTitle">Blog</x-slot>
    <div class="container py-24 px-10 flex flex-col md:flex-row mx-auto">
        <div class="w-full lg:w-2/3">
            <div class="grid grid-cols-1 gap-y-10">
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="search" name="account-number" id="account-number"
                        class="focus:ring-0 focus:border-gray-500 block w-full pr-10 sm:text-sm border-gray-300 rounded text-gray-700"
                        placeholder="Search..." wire:model.debounce.500ms="filter.search">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <x-heroicon-o-search class="h-5 w-5 text-gray-600" />
                    </div>
                </div>
                @forelse ($posts as $item)
                    <a href="{{ route('portfolio.blogs.show', ['locale' => app()->getLocale(), 'postSlug' => $item->slug]) }}"
                        class="border shadow hover:shadow-md px-4 transition hover:-translate-y-2">
                        <h3 class="text-black font-bold text-lg mt-4 leading-normal">
                            {{ Str::limit($item->title, 50) }}
                        </h3>
                        <p class="mt-4 font-medium text-sm leading-normal">
                            {{ Str::limit($item->description, 100) }}
                        </p>
                        <div class="flex justify-end items-center mt-8 mb-4">
                            <div class="flex items-center">
                                <x-heroicon-o-calendar class="h-5 w-5 text-gray-600" />
                                <span
                                    class="ml-1 text-sm text-gray-600">{{ $item->published_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="flex justify-center content-center px-4 pb-12 col-span-1">
                        <div class="text-center">
                            <h6 class="text-xl font-bold">No Posts Found</h6>
                        </div>
                    </div>
                @endforelse

                <div class="flex justify-between content-center px-4 pb-12 col-span-1">
                    <div class="text-left">
                        <a href="#" wire:click.prevent="previousPage" @class([
                            'break-normal text-base font-bold no-underline flex items-center',
                            'hover:underline text-gray-600' => !$posts->onFirstPage(),
                            'cursor-not-allowed text-gray-400' => $posts->onFirstPage(),
                        ])>
                            <x-heroicon-s-chevron-left class="w-5 h-5" />
                            Previous
                        </a>
                    </div>
                    <div class="text-right">
                        <a href="#" wire:click.prevent="nextPage" @class([
                            'break-normal text-base font-bold no-underline flex items-center',
                            'hover:underline text-gray-600' => $posts->hasMorePages(),
                            'cursor-not-allowed text-gray-400' => !$posts->hasMorePages(),
                        ])>
                            Next
                            <x-heroicon-s-chevron-right class="w-5 h-5" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/3 md:ml-10 border-gray-600 border-t md:border-t-0 mt-10 md:mt-0">
            <div class="p-6 mb-8">
                <h3 class="uppercase text-sm text-black/80 tracking-wider font-bold mb-7">Categories</h3>
                <ul class="divide-y">
                    @foreach ($categories as $item)
                        <li class="flex justify-between items-center py-3 font-medium">
                            <a href="javascript:void(0)"
                                wire:click.prevent="$set('filter.categories_slug', '{{ $item->slug }}')"
                                class="text-black/80">{{ Str::limit($item->title, 34) }}</a>
                            <span>({{ $item->posts_count }})</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="p-6 mb-8">
                <h3 class="uppercase text-sm text-black/80 tracking-wider font-bold mb-7">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($tags as $item)
                        <a href="javascript:void(0)" wire:click.prevent="$set('filter.tag', '{{ $item->name }}')"
                            class="inline-block text-sm font-medium text-black/80 px-3 py-1 rounded border border-gray-300 hover:border-gray-500 transition hover:bg-gray-200">
                            {{ $item->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- <div class="p-6 mb-8 bg-neutral-500">
                <h3 class="uppercase text-sm text-white tracking-wider font-bold mb-7">Newsletter</h3>
                <p class="text-white text-sm font-medium">Subscribe to our newsletter and get notified when we update
                    it.</p>
                <div class="flex flex-wrap gap-2 mt-8">
                    <input type="email"
                        class="w-full p-3 text-gray-300 font-medium border border-neutral-300 focus:ring-0 focus:border-gray-300 bg-neutral-500 placeholder:text-gray-300 focus:outline-none"
                        placeholder="Email Address" />
                    <button type="submit"
                        class="w-full p-3 font-medium bg-white hover:bg-gray-100 text-gray-500 transition">Subscribe</button>
                </div>
            </div> --}}
        </div>
    </div>
</div>
