<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.blog.posts.edit', $post->id) }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6 divide-y">
        <x-core::visual.row :title="__('Title')">
            {{ $post->title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Slug')">
            {{ $post->slug }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Description')">
            {{ $post->description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Content')" collapse>
            <x-core::visual.markdown :content="$post->content" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Status')">
            {{ $post->status_text }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Cover Photo')">
            <x-core::visual.image :src="$post->getFirstMediaUrl('cover', 'thumb')" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Category')">
            <div class="flex flex-col">
                @foreach ($post->categories as $category)
                    <a href="{{ route('admin.blog.categories.show', $category->id) }}"
                        class="font-bold text-blue-600 hover:text-green-600 transition">
                        {{ Str::limit($category->title, 20) }}
                    </a>
                @endforeach
            </div>
        </x-core::visual.row>
        <x-core::visual.row :title="__('Tags')">
            <div class="flex flex-wrap gap-2">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('admin.blog.posts.index', ['filter' => ['tag' => $tag->name]]) }}"
                        class="text-green-600 bg-green-100 px-3 py-1 rounded-full border border-green-600 hover:text-green-50 hover:bg-green-600 transition">
                        {{ Str::limit($tag->name, 20) }}
                    </a>
                @endforeach
            </div>
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Title')">
            {{ $post->meta_title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Description')">
            {{ $post->meta_description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Keyword')">
            {{ $post->meta_keyword }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Created At')">
            {{ $post->created_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Updated At')" no-border-bottom>
            {{ $post->updated_at }}
        </x-core::visual.row>
    </div>
</div>
