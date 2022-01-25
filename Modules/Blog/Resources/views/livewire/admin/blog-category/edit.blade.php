<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('Edit')" :description="__('Update blog category.')">
                <x-core::field.form-row title="Title" required>
                    <x-core::field.input type="text" wire:model.debounce.500ms="blogCategory.title" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Slug" required>
                    <x-core::field.input type="text" wire:model.defer="blogCategory.slug" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Description">
                    <x-core::field.input type="text" wire:model.defer="blogCategory.description" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Published">
                    <x-core::field.check type="checkbox" wire:model.defer="blogCategory.is_published" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('SEO')" :description="__('Search Engine Optimization.')"
                class="pt-5">
                <x-core::field.form-row title="Meta Title">
                    <x-core::field.input type="text" wire:model.debounce.500ms="blogCategory.meta_title" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Meta Description">
                    <x-core::field.input type="text" wire:model.defer="blogCategory.meta_description" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Meta Keyword">
                    <x-core::field.input type="text" wire:model.defer="blogCategory.meta_keyword" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <x-core::button.secondary href="{{ route('admin.blog-categories.show', $blogCategory->id) }}">
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
</div>
