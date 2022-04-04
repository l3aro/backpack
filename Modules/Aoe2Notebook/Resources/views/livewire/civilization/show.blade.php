<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.aoe2notebook.civilizations.edit', $civilization->id) }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6">
        <x-core::visual.row :title="__('Name')">
            {{ $civilization->name }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Introduced in')">
            {{ $this->expansionEnums->label($civilization->expansion) }}
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
</div>
