<div class="mx-auto px-4 sm:px-6 lg:px-8">
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
                    <x-input type="search" name="search" wire:model.debounce.500ms="filter.search" icon="search"
                        placeholder="ID, Name" />
                </div>
            </div>
        </div>
        <div class="ml-2 flex">
            <x-core::button.primary :href="route('admin.aoe2notebook.civilizations.create')" class="mr-2">
                <x-heroicon-s-plus class="h-5 w-5" />
            </x-core::button.primary>
        </div>
    </div>
    <x-core::data-table>
        <x-slot name="header">
            <x-core::data-table.heading sortable wire:click="applySort('id')" :direction="$sort['id'] ?? null">
                ID
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('title')" :direction="$sort['name'] ?? null">
                Name
            </x-core::data-table.heading>
            <x-core::data-table.heading>
                Introduced In
            </x-core::data-table.heading>
            <x-core::data-table.heading>
                Army Type
            </x-core::data-table.heading>
            <x-core::data-table.heading>
                Team Bonus
            </x-core::data-table.heading>
            <x-core::data-table.heading class="text-right">
                #
            </x-core::data-table.heading>
        </x-slot>
        @forelse ($civilizations as $civilization)
            <tr wire:key="civilization-{{ $civilization->id }}" wire:sortable.item="{{ $civilization->id }}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ route('admin.aoe2notebook.civilizations.show', $civilization->id) }}"
                        class="font-bold text-blue-600">
                        {{ $civilization->id }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $civilization->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $civilization->expansion->label() }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex flex-col">
                    {{ $civilization->army_type }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $civilization->team_bonus }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                    <x-core::dropdown class="flex justify-end">
                        <x-slot name="trigger">
                            <button type="button"
                                class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                                <x-heroicon-o-dots-vertical class="w-5 h-5" />
                            </button>
                        </x-slot>
                        <x-core::dropdown.link
                            href="{{ route('admin.aoe2notebook.civilizations.show', $civilization->id) }}"
                            role="menuitem" tabindex="-1">
                            <x-heroicon-s-eye class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('View') }}
                        </x-core::dropdown.link>
                        <x-core::dropdown.link
                            href="{{ route('admin.aoe2notebook.civilizations.edit', $civilization->id) }}"
                            role="menuitem" tabindex="-1">
                            <x-heroicon-s-pencil-alt class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Edit') }}
                        </x-core::dropdown.link>
                        <x-core::dropdown.link href="#" wire:click.prevent="destroy({{ $civilization->id }})"
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
                    <div class="text-gray-500">No civilizations found.</div>
                </td>
            </tr>
        @endforelse

        <x-slot name="pagination">
            {{ $civilizations->onEachSide(1)->links() }}
        </x-slot>
    </x-core::data-table>

    <x-core::modal.confirmation wire:model="confirmingDeletion">
        <x-slot name="title">
            {{ __('Delete Project') }} #{{ $confirmingId ?? '' }}
        </x-slot>

        <p class="mb-4 text-sm text-gray-500">
            {{ __('Are you sure you want to delete this civilization? This action cannot be undone.') }}
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
