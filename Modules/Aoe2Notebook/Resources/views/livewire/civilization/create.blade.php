<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('Create')" :description="__('Add new civilization.')">
                <x-core::field.form-row title="Name" required>
                    <x-core::field.input type="text" wire:model.defer="name" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Introduced in">
                    <x-core::field.select wire:model.defer="expansion">
                        @foreach ($this->expansionEnumLabels as $key => $item)
                            <x-core::field.select.option :value="$key" :label="$item" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Army Type">
                    <x-core::field.input type="text" wire:model.defer="army_type" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Avatar">
                    <x-core::field.image wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? ''" />
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
                    <x-core::field.input type="text" wire:model.defer="team_bonus" />
                </x-core::field.form-row>

                {{-- <x-core::field.form-row title="Civilization Bonus">
                    <x-core::field.input type="text" wire:model.defer="army_type" />
                </x-core::field.form-row> --}}
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <x-core::button.secondary href="{{ route('admin.aoe2notebook.civilizations.index') }}">
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
        </form>
    </div>
</div>
