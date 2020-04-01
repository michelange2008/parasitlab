
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
// Route::group(['prefix' => LaravelLocalization::setlocale(),
//               'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ], function() {

  Route::get('/', ['uses' => 'ExtranetController@accueil', 'as' => 'accueil']);

  //##############################################################################
  // PAGE D ACCUEIL PAR TYPE D UTILISATEUR

  Route::get('/vétérinaires', ['uses' => 'ExtranetController@veterinaires', 'as' => 'veterinaires.accueil']);

  Route::get('/éleveurs', ['uses' => 'ExtranetController@eleveurs', 'as' => 'eleveurs.accueil']);

  Route::get('/cavaliers', ['uses' => 'ExtranetController@cavaliers', 'as' => 'cavaliers.accueil']);

  //##############################################################################
  // PAGES TECHNIQUES

  Route::get('/parasitisme', ['uses' => 'Technique\ParasitismeController@accueil', 'as' => 'parasitisme']);

  Route::get('/parasitisme/fondamentaux/{id}', ['uses' => 'Technique\ParasitismeController@fondamentaux', 'as' => 'parasitisme.fondamentaux']);

  Route::get('/parasitisme/surdispersion', ['uses' => 'Technique\ParasitismeController@surdispersion', 'as' => 'parasitisme.surdispersion']);

  Route::get('/parasitisme/résistances', ['uses' => 'Technique\ParasitismeController@resistances', 'as' => 'parasitisme.resistances']);

  Route::get('/parasitisme/entomofaune', ['uses' => 'Technique\ParasitismeController@entomofaune', 'as' => 'parasitisme.entomofaune']);

  Route::get('/coproscopies', ['uses' => 'Technique\CoproscopiesController@accueil', 'as' => 'coproscopies']);

  Route::get('/coproscopies/interpreter', ['uses' => 'Technique\CoproscopiesController@interpreter', 'as' => 'interpreter']);

  Route::resource('blog', 'Technique\BlogController')->except('store', 'edit', 'create', 'destroy', 'update');

  //##############################################################################
  // PAGES POUR LE CHOIX DES ANALYSES LE REMPLISSAGE DU FORMULAIRE LES ASPECTS PRATIQUES

  Route::get('/analyses', ['uses' => 'ExtranetController@analyses', 'as' => 'analyses']); // correspond au menu "pour commencer"

  Route::get('/analyses/tarifs', ['uses' => 'ExtranetController@tarifs', 'as' => 'analyses.tarifs']);

  Route::get('/analyses/tarifsPdf', ['uses' => 'ExtranetController@tarifsPdf', 'as' => 'analyses.tarifsPdf']);

  Route::get('/analyses/formulairePdf', ['uses' => 'ExtranetController@formulairePdf', 'as' => 'analyses.formulairePdf']);

  Route::get('/enpratique', ['uses' => 'Technique\CoproscopiesController@enpratique', 'as' => 'enpratique']);

  Route::get('/analyses/choisir', ['uses' => 'ExtranetDemandeController@choisir', 'as' => 'analyses.choisir']);

  Route::get('/analyses/choisir/{espece}/{anatype}', ['uses' => 'ExtranetDemandeController@formulaireDemande', 'as' => 'analyses.formulaireDemande']);

  Route::post('/analyses/choisir/formulaireDemande', ['uses' => 'ExtranetDemandeController@formulaireStore', 'as' => 'analyses.formulaireStore']);

  Route::get('/formulaire', ['uses' => 'PdfController@formulaire', 'as' => 'formulaire']);

  Route::get('envoiPack', ['uses' => 'ExtranetDemandeController@envoiPack', 'as' => "envoiPack"]);

  Route::post('envoiPackStore', ['uses' => 'ExtranetDemandeController@envoiPackStore', 'as' => "envoiPackStore"]);

  Route::get('/analyses/anatypes/{espece_id}', ['uses' => 'ExtranetDemandeController@anatypeSelonEspece']);

  Route::get('/analyses/anaactes/{anatype_id}', ['uses' => 'ExtranetDemandeController@anaacteSelonAnatype']);

  //##############################################################################
  // PAGES DE CONTACT INFORMATIONS MENTIONS LEGALES

  Route::get('/quisommesnous', ['uses' => 'ExtranetController@quisommesnous', 'as' => 'quisommesnous']);

  Route::get('/contact', ['uses' => 'ExtranetController@contact', 'as' => 'contact']);

  Route::get('/infos-legales', ['uses' => 'ExtranetController@infoslegales', 'as' => 'infoslegales']);

  Route::get('/aide', ['uses' => 'ExtranetController@aide', 'as' => 'aide']);

  Route::get('/presentation', ['uses' => 'PdfController@presentation', 'as' => 'presentation']);
  //##############################################################################

  Auth::routes(['register' => false]);

  Route::get('/home', 'HomeController@index')->name('home');


  Route::group(['middleware' => 'auth', 'middleware' => 'eleveur'], function() {

    Route::get('/eleveur', 'EleveurController@index')->name('eleveur');

    Route::get('/eleveur/demande/{demande_id}', 'EleveurController@demandeShow')->name('eleveur.demandeShow');

    Route::get('/eleveur/serie/{serie_id}', 'EleveurController@serieShow')->name('eleveur.serieShow');

  });

  Route::group(['middleware' => 'auth', 'middleware' => 'veto'], function() {

    Route::get('/veterinaire', 'VeterinaireController@index')->name('veterinaire');

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

    Route::resource('user', 'UserController');

    Route::resource('laboAdmin', 'Labo\LaboAdminController');

    Route::resource('vetoAdmin', 'Labo\VetoAdminController');

    Route::resource('eleveurAdmin', 'Labo\EleveurAdminController');

    Route::resource('serie', 'Labo\SerieController');

    Route::get('usertypes', 'UsertypeController@liste')->name('usertypeJson');

    Route::resource('resultats', 'Labo\ResultatController');

    Route::get('factures/create/{destinataire_id}', 'Labo\FactureController@preCreate')->name('factures.preCreate');

    Route::get('factures/etablir', 'Labo\FactureController@etablir')->name('factures.etablir');

    Route::post('facture/paiement', 'Labo\FactureController@paiement')->name('facture.paiement');

    Route::resource('factures', 'Labo\FactureController');

    Route::get('facture/pdf/{facture_id}', 'PdfController@facture')->name('facture.pdf');

    Route::resource('acte', 'Labo\ActeController');

    Route::resource('blog', 'Technique\BlogController')->except('show');

    Route::get('motclef/{motclef_id}', 'Technique\MotclefController@listeBlogs')->name('motclef.listeblogs');

  });

// 
// });
