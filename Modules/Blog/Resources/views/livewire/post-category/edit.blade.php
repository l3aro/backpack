<x-core::container>
    <div class="bg-white dark:bg-gray-800 rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200 dark:divide-gray-500">
            <x-core::field.form-section :title="__('Edit')" :description="__('Update post category.')">
                <x-core::field.form-row title="Title" required>
                    <x-input type="text" wire:model.debounce.500ms="postCategory.title" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Slug" required>
                    <x-input type="text" wire:model.defer="postCategory.slug" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Description">
                    <x-input type="text" wire:model.defer="postCategory.description" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Published">
                    <x-checkbox wire:model.defer="postCategory.is_published" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('SEO')" :description="__('Search Engine Optimization.')"
                class="pt-5">
                <x-core::field.form-row title="Meta Title">
                    <x-input type="text" wire:model.debounce.500ms="postCategory.meta_title" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Meta Description">
                    <x-input type="text" wire:model.defer="postCategory.meta_description" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Meta Keyword">
                    <x-input type="text" wire:model.defer="postCategory.meta_keyword" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="saveAndContinue"></button>
                    <x-core::button.secondary href="{{ route('admin.blog.categories.show', $postCategory->id) }}">
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
