<x-core::container>
    <x-core::card class="space-y-8">
        <x-core::field.form-section :title="__('Edit')" :description="__('Update user profile.')">
            <x-core::field.form-row title="Name" required>
                <x-input type="text" wire:model.defer="name" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Email" required>
                <x-input type="text" wire:model.defer="email" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Avatar">
                <x-core::field.avatar wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? $user->profile_photo_url" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Type">
                <x-core::field.select wire:model.defer="type" :placeholder="__('Select type')" multiple>
                    @foreach ($this->userTypeEnumLabels as $key => $label)
                        <x-core::field.select.option value="{{ $key }}" :label="$label" />
                    @endforeach
                </x-core::field.select>
            </x-core::field.form-row>
        </x-core::field.form-section>

        <x-core::field.form-section :title="__('Update Password')" :description="__('Setup a new password or keep current one.')" class="pt-8">
            <x-core::field.form-row title="Password">
                <x-input type="password" wire:model.defer="password" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Password Confirmation">
                <x-input type="password" wire:model.defer="password_confirmation" />
            </x-core::field.form-row>
        </x-core::field.form-section>

        <div class="pt-5">
            <div class="flex justify-end">
                <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="saveAndContinue"></button>
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
    </x-core::card>
</x-core::container>
