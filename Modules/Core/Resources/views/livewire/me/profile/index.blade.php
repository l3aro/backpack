<x-core::container>
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.me.profile.edit') }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <x-heroicon-o-pencil-square class="w-5 h-5" />
        </a>
    </div>
    <x-core::card>
        <x-core::visual.row :title="__('Name')">
            {{ $user->name }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Email')">
            {{ $user->email }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Avatar')">
            <x-core::visual.image :src="$user->profile_photo_url" />
        </x-core::visual.row>
    </x-core::card>
</x-core::container>
