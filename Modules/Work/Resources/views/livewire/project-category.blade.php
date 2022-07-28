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
                    <x-input ico="document-search" type="search" name="search" wire:model.debounce.500ms="filter.search"
                        placeholder="ID, Name">
                    </x-input>
                </div>
            </div>
        </div>
        <div class="ml-2 flex">
            <x-core::button.primary wire:click.prevent="add" class="mr-2">
                <x-heroicon-s-plus class="h-5 w-5" />
            </x-core::button.primary>
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
                Project Count
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('created_at')" :direction="$sort['created_at'] ?? null">
                Created At
            </x-core::data-table.heading>
            <x-core::data-table.heading class="text-right">
                #
            </x-core::data-table.heading>
        </x-slot>
        @forelse ($records as $record)
            <tr wire:key="category-{{ $record->id }}" wire:sortable.item="{{ $record->id }}">
                <td wire:sortable.handle
                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 hover:text-gray-500 transition cursor-grab">
                    <x-heroicon-s-switch-vertical class="h-6 w-6" />
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 cursor-pointer">
                    <a wire:click.prevent="edit({{ $record->id }})" class="font-bold text-blue-600">
                        {{ $record->id }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $record->title }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $record->projects_count }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $record->created_at ?? '__' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex justify-end text-sm font-medium">
                    <x-core::dropdown>
                        <x-slot name="trigger">
                            <button type="button"
                                class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                                <x-heroicon-o-dots-vertical class="w-5 h-5" />
                            </button>
                        </x-slot>
                        <x-core::dropdown.link role="menuitem" tabindex="-1"
                            wire:click.prevent="edit({{ $record->id }})">
                            <x-heroicon-s-pencil-alt class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Edit') }}
                        </x-core::dropdown.link>
                        <x-core::dropdown.link href="#" wire:click.prevent="destroy({{ $record->id }})"
                            role="menuitem" tabindex="-1">
                            <x-heroicon-s-trash class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Delete') }}
                        </x-core::dropdown.link>
                    </x-core::dropdown>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center p-6">
                    <div class="text-gray-500">No categories found.</div>
                </td>
            </tr>
        @endforelse

        <x-slot name="pagination">
            {{ $records->onEachSide(1)->links() }}
        </x-slot>
    </x-core::data-table>

    <x-modal.card wire:model.defer="confirmingDeletion" blur>
        <x-slot name="title">
            {{ __('Delete Record') }} #{{ $confirmingId ?? '' }}
        </x-slot>

        <p class="mb-4 text-sm text-gray-500">
            {{ __('Are you sure you want to delete this post category? This action cannot be undone.') }}
        </p>
        <x-slot name="footer">
            <div class="flex justify-between">
                <x-button flat label="Cancel" x-on:click="close" />
                <x-button negative label="Delete" wire:click="confirmDelete" />
            </div>
        </x-slot>
    </x-modal.card>

    <x-modal.card title="Setup Record" blur wire:model.defer="showForm">
        <div class="grid grid-cols-1 gap-4">
            <x-input wire:model.debounce.1s="title" :label="__('Title')" />
            <x-input wire:model.defer="slug" :label="__('Slug')" />
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat :label="__('Cancel')" x-on:click="close" />
                <x-button primary :label="__('Save')" wire:click="save" />
            </div>
        </x-slot>
    </x-modal.card>

</x-core::container>
