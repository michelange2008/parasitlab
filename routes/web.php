<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
// {
//##############################################################################
// MENU ACCUEIL

  Route::get('/essai', 'Api\DonneesController@essai');

  // Route::post('/essai/store', 'Api\DonneesController@options')->name('essai.store');
  Route::post('/essai/store', 'Api\DonneesController@selectAnalyses')->name('essai.store');

  Route::get('/', 'AccueilController@index')->name('accueil');

  Route::get('/accueil', 'AccueilController@index');

  Route::get('veterinaires', ['uses' => 'AccueilController@veterinaires', 'as' => 'veterinaires.accueil']);

  Route::get('eleveurs', ['uses' => 'AccueilController@eleveurs', 'as' => 'eleveurs.accueil']);

  Route::get('cavaliers', ['uses' => 'AccueilController@cavaliers', 'as' => 'cavaliers.accueil']);

  //##############################################################################
  // MENU ANALYSES
  Route::get('analyses/coproscopies', ['uses' => 'Technique\AnalysesController@accueil', 'as' => 'analyses.coproscopies']);

  Route::get('analyses/choisir', ['uses' => 'Technique\AnalysesController@choisir', 'as' => 'analyses.choisir']);

  Route::get('analyses/enpratique', ['uses' => 'Technique\AnalysesController@enpratique', 'as' => 'analyses.enpratique']);

  Route::get('analyses/interpretation', ['uses' => 'Technique\AnalysesController@interpretation', 'as' => 'analyses.interpretation']);

  // ################################################################################
  // MENU PARASITISME

  Route::get('parasitisme', ['uses' => 'Technique\ParasitismeController@accueil', 'as' => 'parasitisme']);

  Route::get('parasitisme/fondamentaux/{id}', ['uses' => 'Technique\ParasitismeController@fondamentaux', 'as' => 'parasitisme.fondamentaux']);

  Route::resource('blog', 'Technique\BlogController')->except('store', 'edit', 'create', 'destroy', 'update');

  //##############################################################################
  // MENU EXPRESS

  Route::get('express/tarifs', ['uses' => 'ExpressController@tarifs', 'as' => 'express.tarifs']);

  Route::get('express/envoiPack', ['uses' => 'ExpressController@envoiPack', 'as' => "express.envoiPack"]);

  Route::post('express/envoiPackStore', ['uses' => 'ExpressController@envoiPackStore', 'as' => "express.envoiPackStore"]);

  //##############################################################################
  // MENU CONTACT INFORMATIONS MENTIONS LEGALES

  Route::get('infos/quisommesnous', ['uses' => 'InfosController@quisommesnous', 'as' => 'infos.quisommesnous']);

  Route::get('infos/contact', ['uses' => 'InfosController@contact', 'as' => 'infos.contact']);

  Route::get('infos/infos-legales', ['uses' => 'InfosController@infoslegales', 'as' => 'infos.infoslegales']);

  Route::get('infos/aide', ['uses' => 'InfosController@aide', 'as' => 'infos.aide']);

  Route::get('infos/rgpd', ['uses' => 'InfosController@rgpd', 'as' => 'infos.rgpd']);
  // Non implémenté
  Route::get('presentation', ['uses' => 'PdfController@presentation', 'as' => 'presentation']);

  Route::get('parasitisme/motclef/{motclef_id}', 'Technique\MotclefController@listeBlogs')->name('motclef.listeblogs');

  //##############################################################################

  Auth::routes(['register' => false]);

  Route::group(['middleware' => 'web', 'middleware' => 'auth', 'middleware' => 'eleveur'], function() {

    Route::get('eleveur', 'EleveurController@index')->name('eleveur');

    Route::get('eleveur/{id}', 'EleveurController@show')->name('eleveur.show');

    Route::post('eleveur', 'EleveurController@update')->name('eleveur.update');

    Route::get('eleveur/demande/{demande_id}', 'EleveurController@demandeShow')->name('eleveur.demandeShow');

    Route::get('resultatPdf/eleveur/{demande_id}', ['uses' => 'PdfController@resultatsPdfEleveur', 'as' => 'resultatspdf.eleveur']);

    Route::get('eleveur/factures', 'EleveurController@facturesIndex')->name('eleveur.facturesIndex');

    Route::get('eleveur/factures/{id}', 'EleveurController@factureShow')->name('eleveur.factureShow');

    Route::get('eleveur/serie/{serie_id}', 'EleveurController@serieShow')->name('eleveur.serieShow');

  });

  // Page perso vétérinaires
  Route::group(['middleware' => 'web', 'middleware' => 'auth', 'middleware' => 'veto'], function() {

    Route::get('veterinaire', 'VeterinaireController@index')->name('veterinaire');

    Route::get('veterinaire/{id}', 'VeterinaireController@show')->name('veterinaire.show');

    Route::post('veterinaire', 'VeterinaireController@update')->name('veterinaire.update');

    Route::get('veterinaire/demande/{demande_id}', 'VeterinaireController@demandeShow')->name('veto.demandeShow');

    Route::get('veterinaire/serie/{serie_id}', 'VeterinaireController@serieShow')->name('veto.serieShow');

    Route::get('resultatPdf/veto/{demande_id}', ['uses' => 'PdfController@resultatsPdfVeto', 'as' => 'resultatspdf.veto']);

  });


  // routes destinées à rediriger l'utilisateur sur des vues différentes en fonction du usertype
  Route::group(['middleware' => 'auth'], function(){

    Route::get('personnel', 'RouteurController@routeurPersonnel')->name('routeurPersonnel');

    Route::get('routeur/serie/{serie_id}', 'RouteurController@routeurSerie')->name('routeurSerie');

    Route::get('routeur/demande/{demande_id}', 'RouteurController@routeurDemande')->name('routeurDemande');


    Route::get('facturePdf/{id}', ['uses' => 'RouteurController@routeurFacturePdf', 'as' => 'routeurFacturePdf']);

    Route::get('resultatsPdf/{id}', ['uses' => 'RouteurController@routeurResultatsPdf', 'as' => 'routeurResultatsPdf']);

  });

  // ROUTES INTERNES AU LABORATOIRE
  Route::group(['middleware' => 'auth', 'middleware' => 'labo', 'prefix' => "laboratoire"], function(){

    Route::get('', 'Labo\DemandeController@index')->name('laboratoire');

    route::resource('analyses', 'Analyses\AnalyseController');

    route::resource('anaactes', 'Analyses\AnaacteController');

    route::resource('anatypes', 'Analyses\AnatypeController');

    route::resource('anaitems', 'Analyses\AnaitemController');

    route::resource('unites', 'Analyses\UniteController');

    route::resource('demandes', 'Labo\DemandeController');

    route::get('signer/{demande_id}', 'Labo\DemandeController@signer')->name('demande.signer');

    route::get('envoyer/{destinataire_id}/{demande_id}', 'Labo\EnvoisController@envoyerResultats')->name('mail.envoyerResultats');

    route::get('envoyer_facture/{facture_id}', 'Labo\EnvoisController@envoyerFacture')->name('mail.envoyerFacture');

    route::get('envoyer_tous/{destinataire_id}/{demande_id}', 'Labo\EnvoisController@envoyerResultatsTous')->name('mail.envoyerResultatsTous');

    Route::resource('user', 'UserController');

    Route::resource('laboAdmin', 'Labo\LaboAdminController');

    Route::resource('vetoAdmin', 'Labo\VetoAdminController');

    Route::resource('eleveurAdmin', 'Labo\EleveurAdminController');

    Route::resource('serie', 'Labo\SerieController');

    Route::get('usertypes', 'UsertypeController@liste')->name('usertypeJson');

    Route::resource('resultats', 'Labo\ResultatController');

    Route::get('resultatPdf/labo/{demande_id}', ['uses' => 'PdfController@resultatsPdfLabo', 'as' => 'resultatspdf.labo']);

    Route::get('factures/create/{destinataire_id}', 'Labo\FactureController@createFromUser')->name('factures.createFromUser');

    Route::get('factures/create/{destinataire_id}/{demande_id}', 'Labo\FactureController@createDemandeFromUser')->name('factures.createDemandeFromUser');

    Route::get('factures/etablir', 'Labo\FactureController@etablir')->name('factures.etablir');

    Route::post('facture/paiement', 'Labo\FactureController@paiement')->name('facture.paiement');

    Route::resource('factures', 'Labo\FactureController');

    Route::resource('reglement', 'Labo\ReglementController');

    Route::resource('acte', 'Labo\ActeController');

    Route::resource('blog', 'Technique\BlogController')->except('show', 'index');

    Route::get('traductions', 'TraductionsController@index')->name('traductions');

    Route::get('icones/suppression', 'IconesController@suppr')->name('icones.suppr');

    Route::resource('icones', 'IconesController');
    //###########################
    // GESTION DE L'ALGORITME DE CHOIX
    Route::get('algorithme', 'Analyses\Algorithme\BaseController@index')->name('algorithme.index');

    Route::resource('algorithme/observations', 'Analyses\Algorithme\ObservationsController');
    // Enregistrement de l'association d'une observation avec un age ou une espece: INUTILE ?
    Route::post('algorithme/animal/observations', 'Analyses\Algorithme\ObservationsController@animalObservationStore')->name('animalObservationStore');
    // Liste des observations associées à un age
    Route::get('algorithme/observations/age/{age_id}', 'Analyses\Algorithme\ObservationsController@age')->name('observations.age');
    // Liste des observations associées à une espece
    Route::get('algorithme/observations/espece/{espece_id}', 'Analyses\Algorithme\ObservationsController@espece')->name('observations.espece');
    // Modification de l'association entre une observation et un age
    Route::get('algorithme/observations/age/{age_id}/{observation_id}', 'Analyses\Algorithme\ObservationsController@ageObservation');
    // Modification de l'association entre une observation et une espece
    Route::get('algorithme/observations/espece/{espece_id}/{observation_id}', 'Analyses\Algorithme\ObservationsController@especeObservation');
    // Modification de l'association d'une observation avec des especes ou des ages
    Route::get('algorithme/observation/animal/{observation_id}', 'Analyses\Algorithme\ObservationsController@editAnimal')->name('observation.editAnimal');
    // Modification de l'association d'une observation avec des options
    Route::get('algorithme/observation/option/{observation_id}', 'Analyses\Algorithme\ObservationsController@editOption')->name('observation.editOption');
    // Modification de l'association d'une observation avec des anatypes
    Route::get('algorithme/observation/anatype/{observation_id}', 'Analyses\Algorithme\ObservationsController@editAnatype')->name('observation.editAnatype');
    // Gestion des options (aka explications)
    Route::resource('algorithme/options',  'Analyses\Algorithme\OptionsController');
    // Renvoie à la liste des anatypes associés à un age
    Route::get('algorithme/analyses/age/{age_id}', 'Analyses\AnatypeController@age')->name('anatypes.age');
    // Renvoie à la liste des anatypes associés à une espece
    Route::get('algorithme/analyses/espece/{espece_id}', 'Analyses\AnatypeController@espece')->name('anatypes.espece');

    Route::put('algorithme/analyses/animal/{id}', 'Analyses\AnatypeController@animalUpdate')->name('anatypes.animalUpdate');

    Route::resource('algorithme/options', 'Analyses\Algorithme\OptionsController');

    Route::resource('algorithme/agesAlgo', 'Analyses\Algorithme\AgesController');

    Route::resource('algorithme/especesAlgo', 'Analyses\Algorithme\EspecesAlgoController');

    Route::resource('algorithme/exclusions', 'Analyses\Algorithme\ExclusionsController');

    Route::delete('algorithme/exclusion/destroyObservation/{observation_id}', 'Analyses\Algorithme\ExclusionsController@destroyObservation')->name('exclusions.destroyObservation');

    Route::delete('algorithme/exclusion/destroyEspece/{observation_id}/{espece_id}', 'Analyses\Algorithme\ExclusionsController@destroyEspece')->name('exclusions.destroyEspece');

    Route::delete('algorithme/exclusion/destroyAge/{observation_id}/{age_id}', 'Analyses\Algorithme\ExclusionsController@destroyAge')->name('exclusions.destroyAge');

    Route::resource('algorithme/exclusionsAnaacte', 'Analyses\Algorithme\ExclusionsAnaacteController');

    Route::delete('algorithme/exclusions/destroyObservation/{observation_id}', 'Analyses\Algorithme\ExclusionsAnaacteController@destroyObservation')->name('exclusionsAnaacte.destroyObservation');

    Route::delete('algorithme/exclusions/destroyEspece/{observation_id}/{espece_id}', 'Analyses\Algorithme\ExclusionsAnaacteController@destroyEspece')->name('exclusionsAnaacte.destroyEspece');

    Route::delete('algorithme/exclusions/destroyAge/{observation_id}/{age_id}', 'Analyses\Algorithme\ExclusionsAnaacteController@destroyAge')->name('exclusionsAnaacte.destroyAge');

  });

// });
