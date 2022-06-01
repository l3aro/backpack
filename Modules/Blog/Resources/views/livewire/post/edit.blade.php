<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="bg-white rounded shadow px-8 py-6">
        <form class="space-y-8 divide-y divide-gray-200">
            <x-core::field.form-section :title="__('Edit')" :description="__('Update post.')">
                <x-core::field.form-row title="Title" required>
                    <x-core::field.input type="text" wire:model.debounce.500ms="title" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Slug" required>
                    <x-core::field.input type="text" wire:model.defer="slug" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Schedule Post">
                    <x-core::field.flatpickr type="text" wire:model.defer="published_at"
                        mode='enableTime: true, dateFormat: "Y-m-d H:i"' />
                </x-core::field.form-row>

                <x-core::field.form-row title="Cover photo">
                    <x-core::field.image wire:model.defer="photo" :default="$photo?->temporaryUrl() ?? ($post->getFirstMediaUrl('cover', 'thumb') ?? '')" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Category" required>
                    <x-core::field.select wire:model.defer="selectedPostCategories" multiple>
                        @foreach ($this->postCategories as $item)
                            <x-core::field.select.option :value="$item->id" :label="$item->title" />
                        @endforeach
                    </x-core::field.select>
                </x-core::field.form-row>

                <x-core::field.form-row title="Tags">
                    <x-core::field.tagify wire:model.defer="tags">
                    </x-core::field.tagify>
                </x-core::field.form-row>

                <x-core::field.form-row title="Description">
                    <x-core::field.input type="text" wire:model.defer="description" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Content" required>
                    <x-core::field.markdown wire:model.defer="content" class="max-w-lg" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <x-core::field.form-section :title="__('SEO')" :description="__('Search Engine Optimization.')" class="pt-5">
                <x-core::field.form-row title="Meta Title">
                    <x-core::field.input type="text" wire:model.debounce.500ms="meta_title" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Meta Description">
                    <x-core::field.input type="text" wire:model.defer="meta_description" />
                </x-core::field.form-row>

                <x-core::field.form-row title="Meta Keyword">
                    <x-core::field.input type="text" wire:model.defer="meta_keyword" />
                </x-core::field.form-row>
            </x-core::field.form-section>

            <div class="pt-5">
                <div class="flex justify-end">
                    <x-core::button.secondary href="{{ route('admin.blog.posts.show', $post->id) }}">
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
