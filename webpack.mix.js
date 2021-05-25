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
    .js('resources/js/factures.js', 'public/js')
    .js('resources/js/infosPerso_modif.js', 'public/js')
    .js('resources/js/choisir.js', 'public/js')
    .js('resources/js/anaitem.js', 'public/js')
    .js('resources/js/demandeCreate', 'public/js')
    .js('resources/js/demandeModif', 'public/js')
    .js('resources/js/createPrelevement', 'public/js')
    .js('resources/js/animalAdd', 'public/js')
    .js('resources/js/melangeAdd', 'public/js')
    .js('resources/js/melangeManager', 'public/js')
    .js('resources/js/inputResultatValeur', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
   .options({
      processCssUrls: false
   }).sourceMaps();

// mix.copy('node_modules/bootstrap-table/dist/extensions/accent-neutralise/bootstrap-table-accent-neutralise.min.js', 'public/js/bootstrap-table-accent-neutralise.min.js');
mix.copy('node_modules/bootstrap-table/dist/bootstrap-table.min.css', 'public/css/bootstrap-table.min.css');
mix.copy('node_modules/jquery-confirm/css/jquery-confirm.css', 'public/css/jquery-confirm.css');
