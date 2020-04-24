<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth', 'middleware' => 'api'], function() {

  Route::get('/especes', ['uses' => 'Api\DonneesController@especes', 'as' => 'especes']);

  // Requete ajax pour sélectionner les observations dans le procédure de choix des analyses
  Route::get('/observations/{espece_id}', ['uses' => 'Api\DonneesController@observationSelonEspece']);

  // Requete ajax pour sélectionner les options et analyses dans la procédure de choix des analyses
  Route::post('/options', ['uses' => 'Api\DonneesController@options', 'as' => 'api.options']);

  Route::get('/anaactes/{anatype_id}/{espece}', ['uses' => 'Api\DonneesController@anaacteSelonAnatypeEspece']);

});
