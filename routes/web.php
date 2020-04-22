
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

  Route::get('/home', ['uses' => 'AccueilController@accueil', 'as' => 'home']);

  Route::get('/', ['uses' => 'AccueilController@accueil', 'as' => 'accueil']);

  Route::get('/vétérinaires', ['uses' => 'AccueilController@veterinaires', 'as' => 'veterinaires.accueil']);

  Route::get('/éleveurs', ['uses' => 'AccueilController@eleveurs', 'as' => 'eleveurs.accueil']);

  Route::get('/cavaliers', ['uses' => 'AccueilController@cavaliers', 'as' => 'cavaliers.accueil']);

  //##############################################################################
  // MENU ANALYSES
  Route::get('analyses/coproscopies', ['uses' => 'Technique\AnalysesController@accueil', 'as' => 'analyses.coproscopies']);

  Route::get('/analyses/choisir', ['uses' => 'Technique\AnalysesController@choisir', 'as' => 'analyses.choisir']);

  Route::get('analyses/enpratique', ['uses' => 'Technique\AnalysesController@enpratique', 'as' => 'analyses.enpratique']);

  Route::get('analyses/interpretation', ['uses' => 'Technique\AnalysesController@interpretation', 'as' => 'analyses.interpretation']);

  // ################################################################################
  // MENU PARASITISME

  Route::get('/parasitisme', ['uses' => 'Technique\ParasitismeController@accueil', 'as' => 'parasitisme']);

  Route::get('/parasitisme/fondamentaux/{id}', ['uses' => 'Technique\ParasitismeController@fondamentaux', 'as' => 'parasitisme.fondamentaux']);

  Route::resource('blog', 'Technique\BlogController')->except('store', 'edit', 'create', 'destroy', 'update');

  //##############################################################################
  // MENU EXPRESS

  Route::get('/express/tarifs', ['uses' => 'ExpressController@tarifs', 'as' => 'express.tarifs']);

  Route::get('/express/envoiPack', ['uses' => 'ExpressController@envoiPack', 'as' => "express.envoiPack"]);

  Route::post('/express/envoiPackStore', ['uses' => 'ExpressController@envoiPackStore', 'as' => "express.envoiPackStore"]);

  //##############################################################################
  // MENU CONTACT INFORMATIONS MENTIONS LEGALES

  Route::get('infos/quisommesnous', ['uses' => 'InfosController@quisommesnous', 'as' => 'infos.quisommesnous']);

  Route::get('infos/contact', ['uses' => 'InfosController@contact', 'as' => 'infos.contact']);

  Route::get('infos/infos-legales', ['uses' => 'InfosController@infoslegales', 'as' => 'infos.infoslegales']);

  Route::get('infos/aide', ['uses' => 'InfosController@aide', 'as' => 'infos.aide']);
  // Non implémenté
  Route::get('/presentation', ['uses' => 'PdfController@presentation', 'as' => 'presentation']);
  //##############################################################################

  Auth::routes(['register' => false]);

  Route::group(['middleware' => 'auth', 'middleware' => 'eleveur'], function() {

    Route::get('/eleveur', 'EleveurController@index')->name('eleveur');

    Route::get('/eleveur/demande/{demande_id}', 'EleveurController@demandeShow')->name('eleveur.demandeShow');

    Route::get('/eleveur/serie/{serie_id}', 'EleveurController@serieShow')->name('eleveur.serieShow');

  });

  // Page perso vétérinaires
  Route::group(['middleware' => 'auth', 'middleware' => 'veto'], function() {

    Route::get('/veterinaire', 'VeterinaireController@index')->name('veterinaire');

    Route::get('/veterinaire/{id}', 'VeterinaireController@show')->name('veterinaire.show');

    Route::get('/veterinaire/demande/{demande_id}', 'VeterinaireController@demandeShow')->name('veto.demandeShow');

    Route::get('/veterinaire/serie/{serie_id}', 'VeterinaireController@serieShow')->name('veto.serieShow');

  });


  // routes destinées à rediriger l'utilisateur sur des vues différentes en fonction du usertype
  Route::group(['middleware' => 'auth'], function(){

    Route::get('/personnel', 'RouteurController@routeurPersonnel')->name('routeurPersonnel');

    Route::get('/routeur/serie/{serie_id}', 'RouteurController@routeurSerie')->name('routeurSerie');

    Route::get('/routeur/demande/{demande_id}', 'RouteurController@routeurDemande')->name('routeurDemande');

    Route::get('/resultatPdf/{demande}', ['uses' => 'PdfController@resultatPdf', 'as' => 'resultatPdf']);

  });



  // ROUTES INTERNES AU LABORATOIRE
  Route::group(['middleware' => 'auth', 'middleware' => 'labo', 'prefix' => "laboratoire"], function(){

    Route::get('/', 'Labo\DemandeController@index')->name('laboratoire');

    route::resource('analyses', 'Analyses\AnalyseController');

    route::resource('anaactes', 'Analyses\AnaacteController');

    route::resource('anatypes', 'Analyses\AnatypeController');

    route::get('estserie/{anaacte_id}/{user_id}', 'Analyses\AnaacteController@estSerie')->name('estserie');

    route::resource('demandes', 'Labo\DemandeController');

    route::get('signer/{demande_id}', 'Labo\DemandeController@signer')->name('demande.signer');

    route::get('envoyer/{destinataire_id}/{demande_id}', 'Labo\EnvoisController@envoyerResultats')->name('mail.envoyerResultats');

    route::get('envoyer_tous/{destinataire_id}/{demande_id}', 'Labo\EnvoisController@envoyerResultatsTous')->name('mail.envoyerResultatsTous');

    Route::resource('user', 'UserController');

    Route::resource('laboAdmin', 'Labo\LaboAdminController');

    Route::resource('vetoAdmin', 'Labo\VetoAdminController');

    Route::resource('eleveurAdmin', 'Labo\EleveurAdminController');

    Route::resource('serie', 'Labo\SerieController');

    Route::get('usertypes', 'UsertypeController@liste')->name('usertypeJson');

    Route::resource('resultats', 'Labo\ResultatController');

    Route::get('factures/create/{destinataire_id}', 'Labo\FactureController@createFromUser')->name('factures.createFromUser');

    Route::get('factures/etablir', 'Labo\FactureController@etablir')->name('factures.etablir');

    Route::post('facture/paiement', 'Labo\FactureController@paiement')->name('facture.paiement');

    Route::resource('factures', 'Labo\FactureController');

    Route::get('facture/pdf/{facture_id}', 'PdfController@facture')->name('facture.pdf');

    Route::resource('reglement', 'Labo\ReglementController');

    Route::resource('acte', 'Labo\ActeController');

    Route::resource('blog', 'Technique\BlogController')->except('show', 'index');

    Route::get('motclef/{motclef_id}', 'Technique\MotclefController@listeBlogs')->name('motclef.listeblogs');

    Route::get('traductions', 'TraductionsController@index')->name('traductions');

  });

// });
