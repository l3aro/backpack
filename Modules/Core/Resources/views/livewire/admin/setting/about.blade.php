<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('General Setting')"
                :description="__('Update general site settings.')">

                <x-core::field.form-row title="Portrait" class="lg:max-w-none">
                    <x-core::field.image wire:model.defer="image" :default="$image?->temporaryUrl() ?? $setting['about_image'] ?? ''" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Content" required class="lg:max-w-none">
                    <x-core::field.markdown wire:model.defer="setting.about_content" height="600px" />
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
