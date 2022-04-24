<div class="mx-auto px-4 sm:px-6 lg:px-8 mt-5">
    <div class="flex justify-end mb-3">
        <a href="{{ route('admin.aoe2notebook.units.edit', $unit->id) }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
            <x-heroicon-o-pencil-alt class="w-5 h-5" />
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6 divide-y">
        <x-core::visual.row :title="__('Name')">
            {{ $unit->name }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Expansion')">
            {{ $unit->expansion_label }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Type')">
            {{ $unit->type_label }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Civilization')">
            {{ $unit->civilization }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Age')">
            {{ $unit->age_label }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Description')" collapse>
            <x-core::visual.markdown :content="$unit->description" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Avatar')">
            <x-core::visual.image :src="$unit->getFirstMediaUrl()" />
        </x-core::visual.row>
        <x-core::visual.row :title="__('Training time')">
            {{ $unit->training_time }}
        </x-core::visual.row>
        @foreach ($resources as $resourceKey => $resourceLabel)
            <x-core::visual.row :title="'Cost ' . $resourceLabel">
                {{ $unit->training_cost[$resourceKey] }}
            </x-core::visual.row>
        @endforeach
        <x-core::visual.row :title="__('Training at')">
            {{ $unit->training_at }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Hit points')">
            {{ $unit->hit_points }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('attack')">
            {{ $unit->attack }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Rate of fire')">
            {{ $unit->rate_of_fire }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Frame delay')">
            {{ $unit->frame_delay }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Attack delay')">
            {{ $unit->attack_delay }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Minimum range')">
            {{ $unit->minimum_range }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Range')">
            {{ $unit->range }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Accuracy')">
            {{ $unit->accuracy }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Projectile speed')">
            {{ $unit->projectile_speed }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Melee armor')">
            {{ $unit->melee_armor }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Pierce armor')">
            {{ $unit->pierce_armor }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Speed')">
            {{ $unit->speed }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Line of sight')">
            {{ $unit->line_of_sight }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Upgrade from')">
            {{ $unit->upgrade_from_id }}
        </x-core::visual.row>
        <x-core::visual.row :title="__('Upgrade to')">
            {{ $unit->upgrade_to_id }}
        </x-core::visual.row>
        @foreach ($resources as $resourceKey => $resourceLabel)
            <x-core::visual.row :title="'Upgrade cost ' . $resourceLabel">
                {{ $unit->upgrade_cost[$resourceKey] }}
            </x-core::visual.row>
        @endforeach
        <x-core::visual.row :title="__('Upgrade time')">
            {{ $unit->upgrade_time }}
        </x-core::visual.row>
    </div>
</div>
