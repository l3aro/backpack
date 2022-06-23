<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <x-core::button.primary href="{{ route('admin.users.edit', $user->id) }}">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </x-core::button.primary>
    </div>
    <div class="bg-white dark:bg-gray-800 dark:divide-gray-700 shadow rounded mb-6 py-3 px-6 divide-y">
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
            @foreach ($user->type as $type)
                <x-core::model.user.type :type="$type" />
            @endforeach
        </x-core::visual.row>
        <x-core::visual.row :title="__('Verified')" no-border-bottom>
            <x-core::visual.boolean :value="$user->isVerified()" />
        </x-core::visual.row>
    </div>
</div>
