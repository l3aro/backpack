<x-core::container>
    <div class="flex justify-between mb-3 mt-5">
        <div class="max-w-lg w-full lg:max-w-md flex">
            <div class="mr-2">
                <x-native-select wire:model="perPage">
                    @foreach ($perPageOptions as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </x-native-select>
            </div>
            <div>
                <label for="search" class="sr-only">Search</label>
                <div class="relative text-gray-400 focus-within:text-gray-500">
                    <x-input ico="document-search" type="search" name="search"
                        wire:model.debounce.500ms="filter.search" placeholder="ID, Name">
                    </x-input>
                </div>
            </div>
        </div>
        <div class="ml-2 flex">
            <x-core::button.primary :href="route('admin.blog.categories.create')" class="mr-2">
                <x-heroicon-s-plus class="h-5 w-5" />
            </x-core::button.primary>
        </div>
    </div>
    <x-core::data-table wire:sortable="reorder">
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
            <x-core::data-table.heading sortable wire:click="applySort('is_published')" :direction="$sort['is_published'] ?? null">
                Publishing
            </x-core::data-table.heading>
            <x-core::data-table.heading>
                Blog Count
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('created_at')" :direction="$sort['created_at'] ?? null">
                Created At
            </x-core::data-table.heading>
            <x-core::data-table.heading class="text-right">
                #
            </x-core::data-table.heading>
        </x-slot>
        @forelse ($postCategories as $postCategory)
            <tr wire:key="category-{{ $postCategory->id }}" wire:sortable.item="{{ $postCategory->id }}">
                <td wire:sortable.handle
                    class="px-6 py-4 flex items-center whitespace-nowrap text-sm text-gray-300 hover:text-gray-500 transition cursor-grab">
                    <x-heroicon-s-arrows-up-down class="h-6 w-6" />
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ route('admin.blog.categories.show', $postCategory->id) }}"
                        class="font-bold text-blue-600">
                        {{ $postCategory->id }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $postCategory->title }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <x-core::visual.boolean :value="$postCategory->is_published" />
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $postCategory->posts_count }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $postCategory->created_at ?? '__' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex justify-end text-sm font-medium">
                    <x-core::dropdown>
                        <x-slot name="trigger">
                            <button type="button"
                                class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                                <x-heroicon-o-ellipsis-vertical class="w-5 h-5" />
                            </button>
                        </x-slot>
                        <x-core::dropdown.link href="{{ route('admin.blog.categories.show', $postCategory->id) }}"
                            role="menuitem" tabindex="-1">
                            <x-heroicon-s-eye class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('View') }}
                        </x-core::dropdown.link>
                        <x-core::dropdown.link href="{{ route('admin.blog.categories.edit', $postCategory->id) }}"
                            role="menuitem" tabindex="-1">
                            <x-heroicon-s-pencil-square class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Edit') }}
                        </x-core::dropdown.link>
                        <x-core::dropdown.link href="#" wire:click.prevent="destroy({{ $postCategory->id }})"
                            role="menuitem" tabindex="-1">
                            <x-heroicon-s-trash class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Delete') }}
                        </x-core::dropdown.link>
                    </x-core::dropdown>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center p-6">
                    <div class="text-gray-500">No categories found.</div>
                </td>
            </tr>
        @endforelse

        <x-slot name="pagination">
            {{ $postCategories->onEachSide(1)->links() }}
        </x-slot>
    </x-core::data-table>

    <x-core::modal.confirmation wire:model="confirmingDeletion">
        <x-slot name="title">
            {{ __('Delete Blog') }} #{{ $confirmingId ?? '' }}
        </x-slot>

        <p class="mb-4 text-sm text-gray-500">
            {{ __('Are you sure you want to delete this post category? This action cannot be undone.') }}
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
</x-core::container>
