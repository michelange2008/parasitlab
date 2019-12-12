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
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('node_modules/bootstrap-table/dist/extensions/accent-neutralise/bootstrap-table-accent-neutralise.min.js', 'public/js/bootstrap-table-accent-neutralise.min.js');
mix.copy('node_modules/bootstrap-table/dist/bootstrap-table.min.css', 'public/css/bootstrap-table.min.css');
mix.copy('node_modules/jquery-confirm/css/jquery-confirm.css', 'public/css/jquery-confirm.css');
