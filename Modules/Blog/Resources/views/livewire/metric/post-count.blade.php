<x-core::metric.card>
    <x-slot name="icon">
        <x-heroicon-o-document-text class="w-6 h-6 text-indigo-600" />
    </x-slot>

    <div class="grid grid-cols-2">
        <dl>
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-200 truncate">
                All Posts
            </dt>
            <dd>
                <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ $postCount }}
                </div>
            </dd>
        </dl>
        <dl>
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-200 truncate">
                Published Posts
            </dt>
            <dd>
                <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ $publishedPostCount }}
                </div>
            </dd>
        </dl>
    </div>

    <x-slot name="footer">
        <a href="{{ route('admin.users.index') }}" class="font-medium dark:text-green-300 dark:hover:text-green-500">
            View all
        </a>
    </x-slot>
</x-core::metric.card>
