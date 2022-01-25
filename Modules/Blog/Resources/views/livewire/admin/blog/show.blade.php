<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.blogs.edit', $blog->id) }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6">
        <x-core::visual.row :title="__('Title')">
            {{ $blog->title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Slug')">
            {{ $blog->slug }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Description')">
            {{ $blog->description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Content')" collapse>
            <x-core::visual.markdown :content="$blog->content" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Status')">
            {{ $blog->status_text }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Category')">
            <div class="flex flex-col">
                @foreach ($blog->categories as $category)
                    <a href="{{ route('admin.blog-categories.show', $category->id) }}"
                        class="font-bold text-blue-600 hover:text-green-600 transition">
                        {{ Str::limit($category->title, 20) }}
                    </a>
                @endforeach
            </div>
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Title')">
            {{ $blog->meta_title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Description')">
            {{ $blog->meta_description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Keyword')">
            {{ $blog->meta_keyword }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Created At')">
            {{ $blog->created_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Updated At')" no-border-bottom>
            {{ $blog->updated_at }}
        </x-core::visual.row>
    </div>
</div>
