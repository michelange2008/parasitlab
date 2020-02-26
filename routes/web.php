
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


Route::get('/', ['uses' => 'ExtranetController@accueil', 'as' => 'accueil']);

//##############################################################################
// PAGE D ACCUEIL PAR TYPE D UTILISATEUR

Route::get('/vétérinaires', ['uses' => 'ExtranetController@veterinaires', 'as' => 'veterinaires.accueil']);

Route::get('/éleveurs', ['uses' => 'ExtranetController@eleveurs', 'as' => 'eleveurs.accueil']);

Route::get('/cavaliers', ['uses' => 'ExtranetController@cavaliers', 'as' => 'cavaliers.accueil']);

//##############################################################################
// PAGES TECHNIQUES

Route::get('/parasitisme', ['uses' => 'Technique\ParasitismeController@accueil', 'as' => 'parasitisme']);

Route::get('/parasitisme/surdispersion', ['uses' => 'Technique\ParasitismeController@surdispersion', 'as' => 'parasitisme.surdispersion']);

Route::get('/parasitisme/résistances', ['uses' => 'Technique\ParasitismeController@resistances', 'as' => 'parasitisme.resistances']);

//##############################################################################
// PAGES DE CONTACT INFORMATIONS MENTIONS LEGALES

Route::get('/quisommesnous', ['uses' => 'ExtranetController@quisommesnous', 'as' => 'quisommesnous']);

Route::get('/contact', ['uses' => 'ExtranetController@contact', 'as' => 'contact']);

Route::get('/aide', ['uses' => 'ExtranetController@aide', 'as' => 'aide']);

Route::get('/presentation', ['uses' => 'PdfController@presentation', 'as' => 'presentation']);

//##############################################################################
// PAGES POUR LE CHOIX DES ANALYSES LE REMPLISSAGE DU FORMULAIRE LES ASPECTS PRATIQUES

Route::get('/analyses', ['uses' => 'ExtranetController@analyses', 'as' => 'analyses']); // correspond au menu "pour commencer"

Route::get('/enpratique', ['uses' => 'ExtranetController@enpratique', 'as' => 'enpratique']);

Route::get('/choisir', ['uses' => 'ExtranetDemandeController@choisir', 'as' => 'choisir']);

Route::get('/choisir/{espece}/{anapack}', ['uses' => 'ExtranetDemandeController@formulaireDemande', 'as' => 'formulaireDemande']);

Route::post('/choisir/formulaireDemande', ['uses' => 'ExtranetDemandeController@formulaireStore', 'as' => 'formulaireStore']);

Route::get('/formulaire', ['uses' => 'PdfController@formulaire', 'as' => 'formulaire']);

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

  route::resource('anapacks', 'Analyses\AnapackController');

  route::get('estserie/{anapack_id}/{user_id}', 'Analyses\AnapackController@estSerie')->name('estserie');

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

});
