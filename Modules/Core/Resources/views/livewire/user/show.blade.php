<x-core::container>
    <div class="flex justify-end mb-3">
        <x-core::button.primary href="{{ route('admin.users.edit', $user->id) }}">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </x-core::button.primary>
    </div>
    <x-core::card>
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
    </x-core::card>
</x-core::container>
