@props(['value'])

@if ($value)
    <x-heroicon-o-check-circle class="w-6 h-6 text-green-600" />
@else
    <x-heroicon-o-x-circle class="w-6 h-6 text-red-600" />
@endif
