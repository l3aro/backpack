<div class="mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between mb-3 mt-5">
        <div class="max-w-lg w-full lg:max-w-md flex">
            <div class="mr-2">
                <x-core::field.select.native wire:model="perPage">
                    @foreach ($perPageOptions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </x-core::field.select.native>
            </div>
            <div>
                <label for="search" class="sr-only">Search</label>
                <div class="relative text-gray-400 focus-within:text-gray-500">
                    <x-core::field.input type="search" name="search" wire:model.debounce.500ms="filter.search"
                        class="block w-full py-2 pl-10 pr-3" placeholder="ID, Name">
                        <x-slot name="prepend">
                            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                <x-heroicon-s-document-search class="h-5 w-5" />
                            </div>
                        </x-slot>
                    </x-core::field.input>
                </div>
            </div>
        </div>
        <div class="ml-2 flex">
            <x-core::button.primary :href="route('admin.blog.posts.create')" class="mr-2">
                <x-heroicon-s-plus class="h-5 w-5" />
            </x-core::button.primary>
            <x-core::dropdown width="w-72">
                <x-slot name="trigger">
                    <x-core::button.secondary>
                        <x-heroicon-o-filter class="w-5 h-5" />
                    </x-core::button.secondary>
                </x-slot>
                <div class="space-y-4 divide-y divide-gray-200 px-4">
                    <div class="pt-2">
                        <b>Filter Options</b>
                    </div>
                    <div class="grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6 py-4">
                        <x-core::field.dropdown-row :title="__('Category')" class="sm:col-span-6">
                            <x-core::field.select.native wire:model="filter.categories_id">
                                <option value="">&nbsp;</option>
                                @foreach ($postCategories as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </x-core::field.select.native>
                        </x-core::field.dropdown-row>
                        <x-core::field.dropdown-row :title="__('Tag')" class="sm:col-span-6">
                            <x-core::field.select.native wire:model="filter.tag">
                                <option value="">&nbsp;</option>
                                @foreach ($postTags as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </x-core::field.select.native>
                        </x-core::field.dropdown-row>
                        <x-core::field.dropdown-row :title="__('Published From')" class="sm:col-span-6">
                            <x-core::field.flatpickr type="text" wire:model="filter.published_at_from" />
                        </x-core::field.dropdown-row>
                        <x-core::field.dropdown-row :title="__('Published To')" class="sm:col-span-6">
                            <x-core::field.flatpickr type="text" wire:model="filter.published_at_to" />
                        </x-core::field.dropdown-row>
                        <x-core::field.dropdown-row class="sm:col-span-6 text-right">
                            <x-core::button.secondary type="button" wire:click="resetFilter" class="text-xs">
                                Reset
                            </x-core::button.secondary>
                        </x-core::field.dropdown-row>
                    </div>
                </div>
            </x-core::dropdown>
        </div>
    </div>
    <x-core::data-table wire:sortable="reorder" draggable="true">
        <x-slot name="header">
            <x-core::data-table.heading class="w-1">
                &nbsp;
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('id')" :direction="$sort['id'] ?? null">
                ID
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('title')" :direction="$sort['title'] ?? null">
                Title
            </x-core::data-table.heading>
            <x-core::data-table.heading>
                Category
            </x-core::data-table.heading>
            <x-core::data-table.heading>
                Status
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('published_at')" :direction="$sort['published_at'] ?? null">
                Published At
            </x-core::data-table.heading>
            <x-core::data-table.heading class="text-right">
                #
            </x-core::data-table.heading>
        </x-slot>
        @forelse ($posts as $post)
            <tr wire:key="post-{{ $post->id }}" wire:sortable.item="{{ $post->id }}">
                <td wire:sortable.handle
                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 hover:text-gray-500 transition cursor-grab">
                    <x-heroicon-s-switch-vertical class="h-6 w-6" />
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <a href="{{ route('admin.blog.posts.show', $post->id) }}" class="font-bold text-blue-600">
                        {{ $post->id }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $post->title }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm flex flex-col">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('admin.blog.categories.show', $category->id) }}"
                            class="font-bold text-blue-600 hover:text-green-600 transition">
                            {{ Str::limit($category->title, 20) }}
                        </a>
                    @endforeach
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $post->status->label() }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    {{ $post->published_at ?? '__' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                    <x-core::dropdown>
                        <x-slot name="trigger">
                            <button type="button"
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                                <x-heroicon-o-dots-vertical class="w-5 h-5" />
                            </button>
                        </x-slot>
                        <a href="{{ route('admin.blog.posts.show', $post->id) }}"
                            class="bg-white hover:bg-gray-100 text-gray-700 group flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1" id="menu-item-0">
                            <x-heroicon-s-eye class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('admin.blog.posts.edit', $post->id) }}"
                            class="bg-white hover:bg-gray-100 text-gray-700 group flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1" id="menu-item-0">
                            <x-heroicon-s-pencil-alt class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Edit') }}
                        </a>
                        <a href="#" wire:click.prevent="destroy({{ $post->id }})"
                            class="bg-white hover:bg-gray-100 text-gray-700 group flex items-center px-4 py-2 text-sm"
                            role="menuitem" tabindex="-1" id="menu-item-1">
                            <x-heroicon-s-trash class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Delete') }}
                        </a>
                    </x-core::dropdown>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center p-6">
                    <div class="text-gray-500">No posts found.</div>
                </td>
            </tr>
        @endforelse

        <x-slot name="pagination">
            {{ $posts->onEachSide(1)->links() }}
        </x-slot>
    </x-core::data-table>

    <x-core::modal.confirmation wire:model="confirmingDeletion">
        <x-slot name="title">
            {{ __('Delete Project') }} #{{ $confirmingId ?? '' }}
        </x-slot>

        <p class="mb-4 text-sm text-gray-500">
            {{ __('Are you sure you want to delete this post? This action cannot be undone.') }}
        </p>
        <x-slot name="footer">
            <x-core::button.secondary type="button" wire:click="$toggle('confirmingDeletion')">
                {{ __('Cancel') }}
            </x-core::button.secondary>
            <x-core::button.danger type="button" class="btn btn-danger" wire:click="confirmDelete">
                {{ __('Delete') }}
            </x-core::button.danger>
        </x-slot>
    </x-core::modal.confirmation>
</div>
