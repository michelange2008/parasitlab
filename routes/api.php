<?php

use Illuminate\Http\Request;

/**
* Routes destinées aux requêtes ajax
*
*/
Route::group(['middleware' => 'auth', 'middleware' => 'api'], function() {

  Route::get('/especes', ['uses' => 'Api\DonneesController@especes', 'as' => 'especes']);

  Route::get('/ages/{espece_id}', ['uses' => 'Api\DonneesController@ages', 'as' => 'ages']);

  // Requête pour sélectionner les troupeaus d'un éleveur et d'une espece
  Route::get('/troupeau/{eleveur_id}/{espece_nom}', ['uses' =>'Api\DonneesController@troupeau']);

  Route::get('/melanges/{troupeau_id}', ['uses' =>'Api\DonneesController@melanges']);

  Route::get('/animal/{troupeau_id}', ['uses' =>'Api\DonneesController@animal']);

  Route::post('melange/addAnimal', ['uses' =>'Api\DonneesController@addAnimal'])->name('melange.addAnimal');

  // Requete pour sélecetionner les troupeaus d'un éleveur quelque soit l'espece
  Route::get('/troupeaus_un_eleveur/{eleveur_id}', ['uses' => 'Api\DonneesController@troupeaus_un_eleveur'])->name('troupeaus_un_eleveur');

  // Requete ajax pour sélectionner les observations dans le procédure de choix des analyses
  Route::get('/observations/especes/{espece_id}', ['uses' => 'Api\DonneesController@observationSelonEspece']);

  // Requete ajax pour sélectionner les observations dans le procédure de choix des analyses
  Route::get('/observations/ages/{age_id}', ['uses' => 'Api\DonneesController@observationSelonAge']);

  // Requete ajax pour sélectionner les options et analyses dans la procédure de choix des analyses
  Route::post('/options', ['uses' => 'Api\DonneesController@selectAnalyses', 'as' => 'api.selectAnalyses']);

  Route::get('/anaactes/{anatype_id}/{espece}', ['uses' => 'Api\DonneesController@anaacteSelonAnatypeEspece']);

  Route::get('/anatypes/{espece}', ['uses' => 'Api\DonneesController@anatypeSelonEspece']);

  Route::get('/estSerie/{anaacte_id}/{user_id}', ['uses' => 'Api\DonneesController@estSerie']);

  Route::get('facture/pdf/{facture_id}', 'PdfController@facture')->name('facture.pdf');

  Route::get('/listeIcones', 'IconesController@liste');

  Route::get('/exclusionsAnatypeObservation/{observation_id}', 'Api\DonneesController@exclusionsAnatypeObservation');

  Route::get('/exclusionsAnaacteObservation/{observation_id}', 'Api\DonneesController@exclusionsAnaacteObservation');


});
