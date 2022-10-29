<x-core::container>
    <div class="flex justify-between mb-3 mt-5">
        <div class="max-w-lg w-full lg:max-w-xs flex">
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
                    <x-input icon="document-search" type="search" name="search"
                        wire:model.debounce.500ms="filter.search" placeholder="ID, Name" />
                </div>
            </div>
        </div>
        <div class="ml-2 flex">
            <x-core::button.primary :href="route('admin.users.create')" class="mr-2">
                <x-heroicon-s-plus class="h-5 w-5" />
            </x-core::button.primary>
            <x-core::dropdown width="w-72">
                <x-slot name="trigger">
                    <x-core::button.secondary type="button">
                        <x-heroicon-o-funnel class="w-5 h-5" />
                    </x-core::button.secondary>
                    </span>
                </x-slot>
                <div class="space-y-4 divide-y divide-gray-200 px-4">
                    <div class="pt-2">
                        <b>Filter Options</b>
                    </div>
                    <div class="grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6 py-4">
                        <x-core::dropdown.row :title="__('Type')" class="sm:col-span-6">
                            <x-select wire:model="arrayFilters.type" multiselect>
                                <x-select.option value="" label="&nbsp;" />
                                @foreach ($this->userTypeEnumLabels as $value => $label)
                                    <x-select.option value="{{ $value }}" :label="$label" />
                                @endforeach
                            </x-select>
                        </x-core::dropdown.row>
                        <x-core::dropdown.row :title="__('Created From')" class="sm:col-span-6">
                            <x-core::field.flatpickr type="text" wire:model="filter.created_at_from" />
                        </x-core::dropdown.row>
                        <x-core::dropdown.row :title="__('Created To')" class="sm:col-span-6">
                            <x-core::field.flatpickr type="text" wire:model="filter.created_at_to" />
                        </x-core::dropdown.row>
                        <x-core::dropdown.row class="sm:col-span-6 text-right">
                            <x-core::button.secondary type="button" wire:click="resetFilter" class="text-xs">
                                Reset
                            </x-core::button.secondary>
                        </x-core::dropdown.row>
                    </div>
                </div>
            </x-core::dropdown>
        </div>
    </div>
    <x-core::data-table>
        <x-slot name="header">
            <x-core::data-table.heading sortable wire:click="applySort('id')" :direction="$sort['id'] ?? null">
                ID
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('name')" :direction="$sort['name'] ?? null">
                Name
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('type_flag')" :direction="$sort['type_flag'] ?? null">
                Type
            </x-core::data-table.heading>
            <x-core::data-table.heading sortable wire:click="applySort('created_at')" :direction="$sort['created_at'] ?? null">
                Created At
            </x-core::data-table.heading>
            <x-core::data-table.heading class="text-right">
                #
            </x-core::data-table.heading>
        </x-slot>
        @forelse ($users as $user)
            <tr wire:key="{{ $user->id }}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="font-bold text-blue-600">
                        {{ $user->id }}
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                {{ $user->name }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $user->email }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @foreach ($user->type as $type)
                        <x-core::model.user.type :type="$type" />
                    @endforeach
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $user->created_at ?? '__' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex justify-end text-sm font-medium">
                    <x-core::dropdown>
                        <x-slot name="trigger">
                            <button type="button"
                                class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 focus:outline-none focus:text-gray-900">
                                <x-heroicon-o-ellipsis-vertical class="w-5 h-5" />
                            </button>
                        </x-slot>
                        <x-core::dropdown.link href="{{ route('admin.users.show', $user->id) }}" role="menuitem">
                            <x-heroicon-s-eye class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('View') }}
                        </x-core::dropdown.link>
                        <x-core::dropdown.link href="{{ route('admin.users.edit', $user->id) }}" role="menuitem">
                            <x-heroicon-s-pencil-square class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Edit') }}
                        </x-core::dropdown.link>
                        <x-core::dropdown.link href="#" wire:click.prevent="destroy({{ $user->id }})"
                            role="menuitem">
                            <x-heroicon-s-trash class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                            {{ __('Delete') }}
                        </x-core::dropdown.link>
                    </x-core::dropdown>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center p-6">
                    <div class="text-gray-500">No users found.</div>
                </td>
            </tr>
        @endforelse

        <x-slot name="pagination">
            {{ $users->onEachSide(1)->links() }}
        </x-slot>
    </x-core::data-table>

    <x-core::modal.confirmation wire:model="confirmingDeletion">
        <x-slot name="title">
            {{ __('Delete User') }} #{{ $confirmingId ?? '' }}
        </x-slot>

        <p class="mb-4 text-sm text-gray-500">
            {{ __('Are you sure you want to delete this user? This action cannot be undone.') }}
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
