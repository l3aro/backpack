@props(['content'])

@php
$id = $attributes->get('id') ?? Str::random(10);
@endphp

<div {{ $attributes->class(['prose']) }} id="{{ $id }}" x-data x-init="Fancybox.bind('#{{ $id }} img', { groupAll: true })">
    {!! \Illuminate\Support\Str::of($content)->markdown() !!}
</div>
