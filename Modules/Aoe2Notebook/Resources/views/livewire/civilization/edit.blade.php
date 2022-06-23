<x-core::container>
    <x-core::card class="space-y-8">
        <x-core::field.form-section :title="__('Create')" :description="__('Add new civilization.')">
            <x-core::field.form-row title="Name" required>
                <x-input type="text" wire:model.defer="name" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Introduced in">
                <x-select wire:model.defer="expansion">
                    @foreach ($this->expansionEnumLabels as $key => $item)
                        <x-select.option :value="$key" :label="$item" />
                    @endforeach
                </x-select>
            </x-core::field.form-row>

            <x-core::field.form-row title="Army Type">
                <x-input type="text" wire:model.defer="army_type" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Cover photo">
                <x-core::field.image wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? ($civilization->getFirstMediaUrl() ?? '')" />
            </x-core::field.form-row>

            {{-- <x-core::field.form-row title="Unique Units" required>
                    <x-core::field.select wire:model.defer="selectedCategories" multiple>
                        @foreach ($postCategories as $item)
                            <x-core::field.select.option :value="$item->id" :label="$item->title" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row> --}}

            {{-- <x-core::field.form-row title="Unique Technologies" required>
                    <x-core::field.select wire:model.defer="selectedCategories" multiple>
                        @foreach ($postCategories as $item)
                            <x-core::field.select.option :value="$item->id" :label="$item->title" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row> --}}

            <x-core::field.form-row title="Team Bonus">
                <x-input type="text" wire:model.defer="team_bonus" />
            </x-core::field.form-row>

            {{-- <x-core::field.form-row title="Civilization Bonus">
                    <x-input type="text" wire:model.defer="army_type" />
                </x-core::field.form-row> --}}
        </x-core::field.form-section>

        <div class="pt-5">
            <div class="flex justify-end">
                <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="saveAndContinue"></button>
                <x-core::button.secondary href="{{ route('admin.aoe2notebook.civilizations.index') }}">
                    Cancel
                </x-core::button.secondary>
                <x-core::button.primary type="submit" wire:click.prevent="saveAndContinue" class="ml-3">
                    Update & Continue
                </x-core::button.primary>
                <x-core::button.primary type="submit" wire:click.prevent="saveAndShow" class="ml-3">
                    Update & View
                </x-core::button.primary>
            </div>
        </div>
    </x-core::card>
</x-core::container>
