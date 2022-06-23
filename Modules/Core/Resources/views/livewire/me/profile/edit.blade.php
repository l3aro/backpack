<x-core::container>
    <x-core::card class="space-y-8">
        <x-core::field.form-section :title="__('Edit')" :description="__('Update your profile.')">
            <x-core::field.form-row title="Name" required>
                <x-input type="text" wire:model.debounce.500ms="user.name" />
            </x-core::field.form-row>
            <x-core::field.form-row title="Email">
                <x-input type="text" value="{{ $user->email }}" readonly />
            </x-core::field.form-row>

            <x-core::field.form-row title="Cover photo">
                <x-core::field.image wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? ($user->profile_photo_url ?? '')" />
            </x-core::field.form-row>
        </x-core::field.form-section>

        <x-core::field.form-section :title="__('Update Password')" :description="__('Setup a new password or keep your current one.')" class="pt-5">

            <x-core::field.form-row title="Password">
                <x-input type="text" wire:model.defer="password" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Password Confirmation">
                <x-input type="text" wire:model.defer="password_confirmation" />
            </x-core::field.form-row>
        </x-core::field.form-section>

        <div class="pt-5">
            <div class="flex justify-end">
                <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="saveAndContinue"></button>
                <x-core::button.secondary href="{{ route('admin.me.profile.index') }}">
                    Cancel
                </x-core::button.secondary>
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
