<x-core::metric.card>
    <x-slot name="icon">
        <x-heroicon-s-user class="w-6 h-6 text-indigo-600" />
    </x-slot>

    <dl>
        <dt class="text-sm font-medium text-gray-500 dark:text-gray-200 truncate">
            Users
        </dt>
        <dd>
            <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ $userCount }}
            </div>
        </dd>
    </dl>
    
    <x-slot name="footer">
        <a href="{{ route('admin.users.index') }}" class="font-medium text-green-300 hover:text-green-500">
            View all
        </a>
    </x-slot>
</x-core::metric.card>