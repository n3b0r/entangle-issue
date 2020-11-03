const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix
    .js('resources/js/app.js', 'public/js/scripts.js')
    .sass('resources/sass/app.scss', 'public/css/styles.css')
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('./tailwind.config.js'),
            require('postcss-discard-comments')({
                removeAll: true
            })
        ],
    }).version();