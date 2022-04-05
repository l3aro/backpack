<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200 gap-y-8">
            <x-core::field.form-section :title="__('Create')" :description="__('Add new unit.')">
                <x-core::field.form-row title="Name" required>
                    <x-core::field.input type="text" wire:model.debounce.500ms="civilization.name" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Introduced in">
                    <x-core::field.select wire:model.defer="civilization.expansion">
                        @foreach ($expansions as $key => $item)
                            <x-core::field.select.option :value="$key" :label="$item" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Type">
                    <x-core::field.input type="text" wire:model.defer="civilization.type" />
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

                <x-core::field.form-row title="Civilization">
                    <x-core::field.input type="text" wire:model.defer="civilization.team_bonus" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Description">
                    <x-core::field.input type="text" wire:model.defer="civilization.team_bonus" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Training')" :description="__('Training Information.')" class="pt-5">
                <x-core::field.form-row title="Trained at">
                    {{-- <x-core::field.select wire:model.defer="civilization.expansion">
                        @foreach ($expansions as $key => $item)
                            <x-core::field.select.option :value="$key" :label="$item" />
                        @endforeach
                    </x-core::field.select> --}}
                </x-core::field.form-row>

                <x-core::field.form-row title="Cost">
                    {{-- <x-core::field.input type="text" wire:model.defer="civilization.type" /> --}}
                </x-core::field.form-row>

                <x-core::field.form-row title="Training time">
                    {{-- <x-core::field.image wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? ''" /> --}}
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Statistics')" :description="__('Statistics Information.')" class="pt-5">
                <x-core::field.form-row title="Hit points">
                    <x-core::field.input type="number" wire:model.defer="civilization.hit_points" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Attack">
                    <x-core::field.input type="number" wire:model.defer="civilization.hit_points" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Attack bonuses">
                    <x-core::field.input type="number" wire:model.defer="civilization.hit_points" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Rate of Fire">
                    <x-core::field.input type="number" wire:model.defer="civilization.rate_of_fire" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Melee armor">
                    <x-core::field.input type="number" wire:model.defer="civilization.melee_armor" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Pierce armor">
                    <x-core::field.input type="number" wire:model.defer="civilization.pierce_armor" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Speed">
                    <x-core::field.input type="number" wire:model.defer="civilization.speed" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Line of Sight">
                    <x-core::field.input type="number" wire:model.defer="civilization.line_of_sight" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('Evolution')" :description="__('Unit Evolution.')" class="pt-5">
                <x-core::field.form-row title="Upgrade from">
                    <x-core::field.input type="number" wire:model.defer="civilization.line_of_sight" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Upgrade to">
                    <x-core::field.input type="number" wire:model.defer="civilization.line_of_sight" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Upgrade cost">
                    <x-core::field.input type="number" wire:model.defer="civilization.line_of_sight" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Upgrade time">
                    <x-core::field.input type="number" wire:model.defer="civilization.upgrade_time" />
                </x-core::field.form-row>
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
