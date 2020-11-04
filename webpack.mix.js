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



mix.combine([
    'public/front/jquery-2.2.4.min.js',
    'public/front/popper.min.js',
    'public/front/bootstrap.min.js',
    'public/front/plugins.js',
    'public/front/slick.min.js',
    'public/front/footer-reveal.min.js',
    'public/front/active.js',
], 'public/js/front.js');
// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
