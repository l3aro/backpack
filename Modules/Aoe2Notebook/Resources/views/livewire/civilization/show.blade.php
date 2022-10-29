<x-core::container>
    <div class="flex justify-end mb-3">
        <x-core::button.primary href="{{ route('admin.aoe2notebook.civilizations.edit', $civilization->id) }}">
            <x-heroicon-o-pencil-square class="w-5 h-5" />
        </x-core::button.primary>
    </div>
    <x-core::card>
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
    </x-core::card>
</x-core::container>
