<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('Edit')" :description="__('Update user profile.')">
                <x-core::field.form-row title="Name" required>
                    <x-core::field.input type="text" wire:model.defer="user.name" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Email" required>
                    <x-core::field.input type="text" wire:model.defer="user.email" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Avatar">
                    <x-core::field.avatar wire:model.defer="photo"
                        :default="$photo?->temporaryUrl() ?? $user->profile_photo_url" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Type">
                    <x-core::field.check-group :description="__('Access level to the application.')">
                        <x-core::field.check type="radio" name="user.is_admin" value="1" :label="__('Admin')"
                            wire:model.defer="user.is_admin" />
                        <x-core::field.check type="radio" name="user.is_admin" value="0" :label="__('Member')"
                            wire:model.defer="user.is_admin" />
                    </x-core::field.check-group>
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Update Password')"
                :description="__('Setup a new password or keep current one.')" class="pt-8">
                <x-core::field.form-row title="Password">
                    <x-core::field.input type="password" wire:model.defer="password" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Password Confirmation">
                    <x-core::field.input type="password" wire:model.defer="password_confirmation" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <x-core::button.secondary href="{{ route('admin.users.show', $user->id) }}">
                        Cancel
                    </x-core::button.secondary>
                    <x-core::button.primary type="submit" wire:click.prevent="saveAndContinue" class="ml-3">
                        Update & Continue Editing
                    </x-core::button.primary>
                    <x-core::button.primary type="submit" wire:click.prevent="saveAndShow" class="ml-3">
                        Update & View
                    </x-core::button.primary>
                </div>
            </div>
        </form>
    </div>
</div>
