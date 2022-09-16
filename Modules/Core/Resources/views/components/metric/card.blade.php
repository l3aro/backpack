@props(['size' => 'normal'])

@php
switch ($size) {
    case 'expanded':
        $sizeClasses = 'lg:col-span-2';
        break;
    case 'full':
        $sizeClasses = 'sm:col-span-2 lg:col-span-3';
        break;
    default:
        $sizeClasses = '';
        break;
}
@endphp

<div
    class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg {{ $sizeClasses }} flex flex-col justify-between">
    <div class="p-5 max-h-44 overflow-y-auto">
        <div class="flex items-center">
            @isset($icon)
                <div class="flex-shrink-0">
                    {{ $icon }}
                </div>
            @endisset
            <div class="@isset($icon)ml-5 @endisset w-0 flex-1">
                {{ $slot }}
            </div>
        </div>
    </div>
    @isset($footer)
        <div class="bg-gray-50 dark:bg-gray-700 px-5 py-3">
            <div class="text-sm">
                {{ $footer }}
            </div>
        </div>
    @endisset
</div>
