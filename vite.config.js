import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'

export default defineConfig({
    plugins: [
        laravel([
            'Modules/Core/Resources/assets/js/app.js',
            'Modules/Core/Resources/assets/css/app.css',
        ]),
    ],
})
