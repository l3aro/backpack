<x-core::container>
    <x-core::card class="space-y-8">
        <x-core::field.form-section :title="__('Portfolio Setting')" :description="__('Update portfolio site settings.')">

            <x-core::field.form-row title="Greeting" required>
                <x-input type="text" wire:model.defer="setting.portfolio_greeting" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Intro" required>
                <x-input type="text" wire:model.defer="setting.portfolio_intro" />
            </x-core::field.form-row>

        </x-core::field.form-section>

        <div class="pt-5">
            <div class="flex justify-end">
                <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="save"></button>
                <x-core::button.secondary>
                    Reset
                </x-core::button.secondary>
                <x-core::button.primary type="submit" wire:click.prevent="save" class="ml-3">
                    Update
                </x-core::button.primary>
            </div>
        </div>
    </x-core::card>
</x-core::container>
