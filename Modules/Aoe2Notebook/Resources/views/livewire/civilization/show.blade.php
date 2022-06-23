<x-core::container>
    <div class="flex justify-end mb-3">
        <x-core::button.primary href="{{ route('admin.aoe2notebook.civilizations.edit', $civilization->id) }}">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </x-core::button.primary>
    </div>
    <div class="bg-white dark:bg-gray-800 dark:divide-gray-700 shadow rounded mb-6 py-3 px-6 divide-y">
        <x-core::visual.row :title="__('Name')">
            {{ $civilization->name }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Introduced in')">
            {{ $civilization->expansion->label() }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Army Type')">
            {{ $civilization->army_type }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Unique Units')" collapse>
            ...
        </x-core::visual.row>
        <x-core::visual.row :title="__('Unique Techonologies')" collapse>
            ...
        </x-core::visual.row>
        <x-core::visual.row :title="__('Avatar')">
            <x-core::visual.image :src="$civilization->getFirstMediaUrl()" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Team Bonus')">
            {{ $civilization->team_bonus }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Civilization Bonus')" collapse>
            ...
        </x-core::visual.row>
        <x-core::visual.row :title="__('Created At')">
            {{ $civilization->created_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Updated At')" no-border-bottom>
            {{ $civilization->updated_at }}
        </x-core::visual.row>
    </div>
</x-core::container>
