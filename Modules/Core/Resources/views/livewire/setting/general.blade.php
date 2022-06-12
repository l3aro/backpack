<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('General Setting')"
                :description="__('Update general site settings.')">

                <x-core::field.form-row title="Site Name" required>
                    <x-core::field.input type="text" wire:model.defer="setting.site_name" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Site Description">
                    <x-core::field.input type="text" wire:model.defer="setting.site_description" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Site Keywords">
                    <x-core::field.input type="text" wire:model.defer="setting.site_keywords" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Site Email">
                    <x-core::field.input type="text" wire:model.defer="setting.site_email" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Site Phone">
                    <x-core::field.input type="text" wire:model.defer="setting.site_phone" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Site Address">
                    <x-core::field.input type="text" wire:model.defer="setting.site_address" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Site Map">
                    <x-core::field.input type="text" wire:model.defer="setting.site_map" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Site Google Analytics">
                    <x-core::field.input type="text" wire:model.defer="setting.site_google_analytics" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <x-core::button.secondary>
                        Reset
                    </x-core::button.secondary>
                    <x-core::button.primary type="submit" wire:click.prevent="save" class="ml-3">
                        Update
                    </x-core::button.primary>
                </div>
            </div>
        </form>
    </div>
</div>
