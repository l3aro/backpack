<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.blog-categories.edit', $blogCategory->id) }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6">
        <x-core::visual.row :title="__('Title')">
            {{ $blogCategory->title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Slug')">
            {{ $blogCategory->slug }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Description')">
            {{ $blogCategory->description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Published')">
            <x-core::visual.boolean :value="$blogCategory->published" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Title')">
            {{ $blogCategory->meta_title }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Description')">
            {{ $blogCategory->meta_description }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Meta Keyword')">
            {{ $blogCategory->meta_keyword }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Created At')">
            {{ $blogCategory->created_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Updated At')">
            {{ $blogCategory->updated_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Blog Count')" no-border-bottom>
            @if ($blogCategory->blogs_count)
                <a href="{{ route('admin.blogs.index', ['filter' => ['blog_category_id' => $blogCategory->id]]) }}" class="font-bold text-blue-600">
                    {{ $blogCategory->blogs_count }} {{ __('blogs') }}
                </a>
            @else
                0 {{ __('blogs') }}
            @endif
        </x-core::visual.row>
    </div>
</div>
