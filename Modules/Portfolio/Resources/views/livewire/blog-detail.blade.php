<div class="min-h-screen">
    <x-slot name="metaTitle">{{ $post->meta_title ?? $post->title }}</x-slot>
    <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal mt-20 lg:mt-10">
        <a href="{{ route('portfolio.blogs.index', app()->getLocale()) }}"
            class="text-base md:text-sm text-orange-600 font-bold no-underline transition flex items-center">
            <x-heroicon-s-arrow-left class="inline-block w-5 h-5 mr-2" />
            BACK TO BLOG
        </a>
        <div class="prose mx-auto">
            <div class="font-sans">
                <h1 class="font-bold break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    {{ $post->title }}
                </h1>
                <p class="text-sm md:text-base font-normal text-gray-600">
                    Published {{ $post->published_at }}
                </p>
            </div>

            <div class="mt-3">
                <x-core::visual.markdown :content="$post->content" class="prose-headings:text-lg" />
            </div>

            <hr>

        </div>
    </div>
</div>
