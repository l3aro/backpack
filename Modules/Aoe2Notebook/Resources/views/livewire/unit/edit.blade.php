<x-core::container>
    <div class="bg-white dark:bg-gray-800 rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200 dark:divide-gray-500 gap-y-8">
            <x-core::field.form-section :title="__('Edit')" :description="__('Update post')">
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

                <x-core::field.form-row title="Type">
                    <x-select wire:model.defer="type" multiple>
                        @foreach ($this->unitTypeEnumLabels as $key => $item)
                            <x-select.option :value="$key" :label="$item" />
                        @endforeach
                    </x-select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Avatar">
                    <x-core::field.image wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? $unit->getFirstMediaUrl() ?? ''" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Civilization">
                    <x-input type="text" wire:model.defer="civilization" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Age">
                    <x-select wire:model.defer="age">
                        @foreach ($this->ageEnumLabels as $key => $item)
                            <x-select.option :value="$key" :label="$item" />
                        @endforeach
                    </x-select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Description">
                    <x-input type="text" wire:model.defer="description" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Training')" :description="__('Training Information.')" class="pt-5">
                <x-core::field.form-row title="Trained at">
                    {{-- <x-core::field.select wire:model.defer="expansion">
                        @foreach ($expansions as $key => $item)
                            <x-core::field.select.option :value="$key" :label="$item" />
                        @endforeach
                    </x-core::field.select> --}}
                </x-core::field.form-row>

                @foreach ($this->resourceEnumLabels as $resourceKey => $resourceLabel)
                    <x-core::field.form-row :title="'Cost ' . $resourceLabel">
                        <x-input type="number" wire:model.defer="trainingCosts.{{ $resourceKey }}" />
                    </x-core::field.form-row>
                @endforeach

                <x-core::field.form-row title="Training time (second)">
                    <x-input type="number" wire:model.defer="training_time" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Statistics')" :description="__('Statistics Information.')" class="pt-5">
                <x-core::field.form-row title="Hit points">
                    <x-input type="number" wire:model.defer="hit_points" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Attack">
                    <x-input type="number" wire:model.defer="attack" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Attack bonuses">
                    <x-input type="number" wire:model.defer="hit_points" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Rate of Fire">
                    <x-input type="number" wire:model.defer="rate_of_fire" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Frame delay">
                    <x-input type="number" wire:model.defer="frame_delay" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Attack delay">
                    <x-input type="number" wire:model.defer="attack_delay" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Minimum range">
                    <x-input type="number" wire:model.defer="minimum_range" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Range">
                    <x-input type="number" wire:model.defer="range" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Accuracy">
                    <x-input type="number" wire:model.defer="accuracy" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Projectile speed">
                    <x-input type="number" wire:model.defer="projectile_speed" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Melee armor">
                    <x-input type="number" wire:model.defer="melee_armor" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Pierce armor">
                    <x-input type="number" wire:model.defer="pierce_armor" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Speed">
                    <x-input type="number" wire:model.defer="speed" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Line of Sight">
                    <x-input type="number" wire:model.defer="line_of_sight" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Evolution')" :description="__('Unit Evolution.')" class="pt-5">
                <x-core::field.form-row title="Upgrade from">
                    {{-- <x-input type="number" wire:model.defer="line_of_sight" /> --}}
                </x-core::field.form-row>

                <x-core::field.form-row title="Upgrade to">
                    {{-- <x-input type="number" wire:model.defer="line_of_sight" /> --}}
                </x-core::field.form-row>

                @foreach ($this->resourceEnumLabels as $resourceKey => $resourceLabel)
                    <x-core::field.form-row :title="'Upgrade cost ' . $resourceLabel">
                        <x-input type="number" wire:model.defer="upgradeCosts.{{ $resourceKey }}" />
                    </x-core::field.form-row>
                @endforeach

                <x-core::field.form-row title="Upgrade time">
                    <x-input type="number" wire:model.defer="upgrade_time" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="saveAndContinue"></button>
                    <x-core::button.secondary href="{{ route('admin.aoe2notebook.units.index') }}">
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
        </form>
    </div>
</x-core::container>
