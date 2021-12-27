@props(['title' => 'UP', 'color' => 'green'])

@php
switch ($color) {
    case 'yellow':
        $progress = 'bg-yellow-600';
        $button = 'bg-yellow-600 hover:text-yellow-600 border-yellow-600';
        break;

    default:
        $progress = 'bg-green-600';
        $button = 'bg-green-600 hover:text-green-600 border-green-600';
        break;
}
@endphp

<div id="top"></div>
<template x-data x-teleport="body">
    <div x-data="{height: 0, element: document.body, start: null}" x-cloak aria-hidden="true"
        class="fixed h-screen w-1 top-0 left-0 bg-gray-300" x-on:scroll.window="
            () => {
                const distanceFromTop = element.offsetTop
                const contentHeight = element.clientHeight
                const visibleContent = contentHeight - window.innerHeight
                start = Math.max(0, window.scrollY - distanceFromTop)
                const percent = (start / visibleContent) * 100;
                requestAnimationFrame(() => {
                    height = percent;
                });
            }
        ">

        <div :style="`max-height:${height}%`" class="h-full {{ $progress }}"></div>
        <a id="btt" href="javascript:void(0)"
            class="fixed bottom-0 right-0 mb-4 mr-4 text-gray-200 border hover:bg-gray-200 hover:border-browngray no-underline shadow-md p-4 text-center rounded-md {{ $button }}"
            title="Back to Top" x-show.transition="start > 720" x-on:click.prevent="
                    document.querySelector('#top').scrollIntoView({ behavior: 'smooth' });
                ">
            {{ $title }}
        </a>
    </div>
</template>
