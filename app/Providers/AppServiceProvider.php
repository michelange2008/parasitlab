<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_TIME, config('app.locale'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Blade::directive('date', function ($expression) {
          return "<?php echo ($expression)->format('d M Y'); ?>";
      });

      Blade::include('admin.eleveurDetail','eleveurDetail');
      Blade::include('fragments.nomLien','nomLien');
      Blade::include('fragments.voir','voir');
      Blade::include('fragments.ouinon','ouinon');
      Blade::include('fragments.supprLigne','supprLigne');
      Blade::include('fragments.modifierLigne','modifierLigne');
      Blade::include('fragments.dateSortable','dateSortable');
      Blade::include('fragments.flash','flash');
      Blade::include('labo.demandeShow', 'demandeShow');
      Blade::include('labo.serieShow', 'serieShow');
      Blade::include('fragments.titre', 'titre');
      Blade::include('admin.titreCreationUser', 'titreCreationUser');

      Blade::include('fragments.image', 'image');

      Blade::include('fragments.bouton', 'bouton');
      Blade::include('fragments.boutonSavoirPlus', 'boutonSavoirPlus');
      Blade::include('fragments.boutonRetour', 'retour');
      Blade::include('fragments.blocEnregistreAnnule', 'enregistreAnnule');
    }
}
