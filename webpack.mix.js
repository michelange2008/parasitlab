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

mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css', 'public/css/jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css', 'public/css/responsive.jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-fixedheader-dt/css/fixedHeader.dataTables.min.css', 'public/css/fixedHeader.dataTables.min.css');
mix.copy('node_modules/jquery-confirm/css/jquery-confirm.css', 'public/css/jquery-confirm.css');
