const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


mix.scripts([
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/moment.min.js',
    'resources/assets/js/fullcalendar.min.js'


], 'public/js/all.js');


mix.styles([
    'resources/assets/css/fullcalendar.min.css',
    'resources/assets/css/churchillcalendar.css'


], 'public/css/all.css');