@props(['items' => []])

@foreach ($items as $item)
    @unless($item->hasChildren())
        <x-core::aside.link href="{{ $item->url() }}" :active="$item->active()" :new-tab="$item->shouldOpenNewTab()">
            <x-dynamic-component :component="$item->icon()" class="mr-4 flex-shrink-0 h-6 w-6" />
            {{ $item->title() }}
        </x-core::aside.link>
    @else
        <x-core::aside.divider :title="$item->title() ?? ''" />
        <x-core::aside.section :items="$item->children()" />
    @endunless
@endforeach
