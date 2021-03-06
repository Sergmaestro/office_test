const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .sass('resources/sass/reset.scss', 'public/css/reset.css')
    .sass('resources/sass/app.scss', 'public/css/')
    .copyDirectory('resources/vendor/img', 'public/js/img')
    .options({
        processCssUrls: false
    })
    .sourceMaps()
    .version();

mix.copyDirectory('resources/static/images', 'public/images')
    .copyDirectory('resources/static/fonts', 'public/fonts')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
