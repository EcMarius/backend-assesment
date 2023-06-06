const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    tailwindcss,
    require('postcss-nesting'),
    require('autoprefixer'),
]);