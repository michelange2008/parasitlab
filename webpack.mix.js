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
    .js('resources/js/choisir2.js', 'public/js')
    .js('resources/js/anaitem.js', 'public/js')
    .js('resources/js/demandeCreate', 'public/js')
    .js('resources/js/demandeModif', 'public/js')
    .js('resources/js/createPrelevement', 'public/js')
    .js('resources/js/animalAdd', 'public/js')
    .js('resources/js/melangeAdd', 'public/js')
    .js('resources/js/melangeManager', 'public/js')
    .js('resources/js/inputResultatValeur', 'public/js')
    .js('resources/js/stats.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .babelConfig({
      plugins: ['@babel/plugin-syntax-dynamic-import']
  })
   .options({
      processCssUrls: false
   }).sourceMaps();

mix.copy('node_modules/chart.js/dist/chart.js', 'public/js/chart.js');