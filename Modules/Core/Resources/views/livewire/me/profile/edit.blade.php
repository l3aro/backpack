<x-core::container>
    <x-core::card class="space-y-8">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Edit
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Update your profile.
                    </p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Name <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" wire:model.debounce.1s="user.name"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            <x-core::field.session-error field="user.name" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Email
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" value="{{ $user->email }}" readonly
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md bg-gray-100">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Avatar
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="flex items-center">
                                <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                    <img src="{{ $photo?->temporaryUrl() ?? $user->profile_photo_url }}"
                                        alt="Avatar" class="h-full w-full object-cover">
                                </span>
                                <label
                                    class="cursor-pointer ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Change
                                    <input type="file" class="hidden" wire:model="photo">
                                </label>
                            </div>
                            <x-core::field.session-error field="photo" />
                        </div>
                    </div>

                </div>

            </div>

            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Update Password
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Setup a new password or keep your current one.
                    </p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Password
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="password" wire:model.defer="password"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            <x-core::field.session-error field="password" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Password Confirmation
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="password" wire:model.defer="password_confirmation"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('admin.me.profile.index') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <x-core::button.primary type="submit" wire:click.prevent="saveAndContinue" class="ml-2">
                    Update & Continue Editing
                </x-core::button.primary>
                <x-core::button.primary type="submit" wire:click.prevent="saveAndView" class="ml-2">
                    Update & View
                </x-core::button.primary>
            </div>
        </div>
    </x-core::card>
</x-core::container>
