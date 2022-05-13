@props(['content'])

@php
$id = $attributes->get('id') ?? Str::random(10);
@endphp

<div {{ $attributes->class(['prose']) }} id="{{ $id }}" x-data="prose">
    {!! \Illuminate\Support\Str::of($content)->markdown() !!}
</div>
