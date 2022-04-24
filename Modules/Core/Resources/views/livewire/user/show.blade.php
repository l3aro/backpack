<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.users.edit', $user->id) }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <!-- Heroicon name: outline/pencil-alt -->
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6 divide-y">
        <x-core::visual.row :title="__('Name')">
            {{ $user->name }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Email')">
            {{ $user->email }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Avatar')">
            <img class="inline-block h-14 w-14 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
        </x-core::visual.row>
        <x-core::visual.row :title="__('Type')">
            {{ $userType }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Verified')" no-border-bottom>
            <x-core::visual.boolean :value="$user->isVerified()" />
        </x-core::visual.row>
    </div>
</div>
