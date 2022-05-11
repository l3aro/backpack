@props(['type'])

@php
$type = \Modules\Core\Enums\UserTypeEnum::tryFrom($type);
$accent = match($type)  {
    \Modules\Core\Enums\UserTypeEnum::DEACTIVATED => 'bg-red-100 text-red-800',
    \Modules\Core\Enums\UserTypeEnum::USER => 'bg-blue-100 text-blue-800',
    \Modules\Core\Enums\UserTypeEnum::ADMIN => 'bg-green-100 text-green-800',
}
@endphp

<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $accent }}">{{ $type->label() }}</span>