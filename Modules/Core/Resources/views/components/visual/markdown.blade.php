@props(['content'])

<div {{ $attributes->class(['prose']) }}>
    {!! \Illuminate\Support\Str::of($content)->markdown() !!}
</div>
