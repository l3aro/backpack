const mix = require('laravel-mix');

mix.js('Modules/Core/Resources/assets/js/app.js', 'public/assets/js').extract()

mix.postCss('Modules/Core/Resources/assets/css/app.css', 'public/assets/css', [
    require('tailwindcss'),
])
