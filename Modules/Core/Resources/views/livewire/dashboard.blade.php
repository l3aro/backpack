<div class="mt-8">
    @foreach ($metrics as $metric)
        <x-core::metric :title="$metric['title']">
            @foreach ($metric['components'] as $component)
                <livewire:is :component="$component" />
            @endforeach
        </x-core::metric>
    @endforeach
</div>
