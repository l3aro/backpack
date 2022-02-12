<x-core::metric.card>
    <x-slot name="icon">
        <x-heroicon-s-user class="w-6 h-6 text-indigo-600" />
    </x-slot>

    <dl>
        <dt class="text-sm font-medium text-gray-500 truncate">
            Users
        </dt>
        <dd>
            <div class="text-lg font-medium text-gray-900">
                {{ $userCount }}
            </div>
        </dd>
    </dl>
    
    <x-slot name="footer">
        <a href="{{ route('admin.users.index') }}" class="font-medium text-green-700 hover:text-green-900">
            View all
        </a>
    </x-slot>
</x-core::metric.card>