<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <x-core::button.primary href="{{ route('admin.blog.categories.edit', $postCategory->id) }}">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </x-core::button.primary>
    </div>
    <div class="bg-white dark:bg-gray-800 dark:divide-gray-700 shadow rounded mb-6 py-3 px-6 divide-y">
        <x-core::visual.row :title="__('Title')">
            {{ $postCategory->title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Slug')">
            {{ $postCategory->slug }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Description')">
            {{ $postCategory->description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Published')">
            <x-core::visual.boolean :value="$postCategory->is_published" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Title')">
            {{ $postCategory->meta_title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Description')">
            {{ $postCategory->meta_description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Keyword')">
            {{ $postCategory->meta_keyword }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Created At')">
            {{ $postCategory->created_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Updated At')">
            {{ $postCategory->updated_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Blog Count')" no-border-bottom>
            @if ($postCategory->posts_count)
                <a href="{{ route('admin.blog.posts.index', ['filter' => ['categories_id' => $postCategory->id]]) }}"
                    class="font-bold text-blue-600">
                    {{ $postCategory->posts_count }} {{ __('posts') }}
                </a>
            @else
                0 {{ __('posts') }}
            @endif
        </x-core::visual.row>
    </div>
</div>
