<x-core::container>
    <x-core::card class="space-y-8">
        <x-core::field.form-section :title="__('Create')" :description="__('Add new account.')">
            <x-core::field.form-row title="Name" required>
                <x-input type="text" wire:model.defer="name" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Email" required>
                <x-input type="text" wire:model.defer="email" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Avatar">
                <x-core::field.avatar wire:model.defer="photo" :default="$photo?->temporaryUrl()" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Type" required>
                <x-select wire:model.defer="type" :placeholder="__('Select type')" multiselect>
                    @foreach ($this->userTypeEnumLabels as $key => $label)
                        <x-select.option value="{{ $key }}" :label="$label" />
                    @endforeach
                </x-select>
            </x-core::field.form-row>

            <x-core::field.form-row title="Password" required>
                <x-input type="password" wire:model.defer="password" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Password Confirmation" required>
                <x-input type="password" wire:model.defer="password_confirmation" />
            </x-core::field.form-row>
        </x-core::field.form-section>

        <div class="pt-5">
            <div class="flex justify-end">
                <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="saveAndContinue"></button>
                <x-core::button.secondary href="{{ route('admin.users.index') }}">
                    Cancel
                </x-core::button.secondary>
                <x-core::button.primary type="submit" wire:click.prevent="saveAndContinue" class="ml-3">
                    Create & Add New One
                </x-core::button.primary>
                <x-core::button.primary type="submit" wire:click.prevent="saveAndShow" class="ml-3">
                    Create & View
                </x-core::button.primary>
            </div>
        </div>
    </x-core::card>
</x-core::container>
