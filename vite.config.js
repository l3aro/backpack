import laravel from 'laravel-vite-plugin'
import livewire, { defaultWatches } from '@defstudio/vite-livewire-plugin'
import { defineConfig } from 'vite'

export default defineConfig({
    plugins: [
        laravel([
            'Modules/Core/Resources/assets/js/app.js',
            'Modules/Core/Resources/assets/css/app.css',
        ]),
        livewire({
            refresh: ['Modules/Core/Resources/assets/css/app.css'],
            watch: [...defaultWatches, '**/Modules/**/Livewire/**/*.php'],
        }),
    ],
})
