<x-core::container>
    <x-core::card class="space-y-8">
        <x-core::field.form-section :title="__('Create')" :description="__('Add new post.')">
            <x-core::field.form-row title="Title" required>
                <x-input type="text" wire:model.debounce.500ms="title" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Slug" required>
                <x-input type="text" wire:model.defer="slug" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Schedule Post">
                <x-core::field.flatpickr type="text" wire:model.defer="published_at"
                    mode='enableTime: true, dateFormat: "Y-m-d H:i"' />
            </x-core::field.form-row>

            <x-core::field.form-row title="Cover photo">
                <x-core::field.image wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? ''" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Category" required>
                <x-select wire:model.defer="selectedCategories" multiple>
                    @foreach ($this->postCategories as $item)
                        <x-select.option :value="$item->id" :label="$item->title" />
                    @endforeach
                </x-select>
            </x-core::field.form-row>

            <x-core::field.form-row title="Tags">
                <x-core::field.tagify wire:model.defer="tags">
                </x-core::field.tagify>
            </x-core::field.form-row>

            <x-core::field.form-row title="Description">
                <x-input type="text" wire:model.defer="description" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Content" required class="max-w-none z-10">
                <x-core::field.markdown wire:model.defer="content" class="max-w-lg" />
            </x-core::field.form-row>
        </x-core::field.form-section>

        <x-core::field.form-section :title="__('SEO')" :description="__('Search Engine Optimization.')" class="pt-5">
            <x-core::field.form-row title="Meta Title">
                <x-input type="text" wire:model.debounce.500ms="meta_title" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Meta Description">
                <x-input type="text" wire:model.defer="meta_description" />
            </x-core::field.form-row>

            <x-core::field.form-row title="Meta Keyword">
                <x-input type="text" wire:model.defer="meta_keyword" />
            </x-core::field.form-row>
        </x-core::field.form-section>

        <div class="pt-5">
            <div class="flex justify-end">
                <button x-data x-mousetrap.global.command+s.ctrl+s wire:click.prevent="saveAndContinue"></button>
                <x-core::button.secondary href="{{ route('admin.blog.posts.index') }}">
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
