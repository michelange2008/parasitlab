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
//
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['uses' => 'ExtranetController@accueil', 'as' => 'accueil']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// QUESTION: : Faut-il garder ces routes non protégées ?

Route::get('/eleveur', 'EleveurController@index')->name('eleveur');

Route::get('/veterinaire', 'VeterinaireController@index')->name('veterinaire');

Route::group(['middleware' => 'auth', 'middleware' => 'labo', 'prefix' => "laboratoire"], function(){

  Route::get('/', 'Labo\DemandeController@index')->name('laboratoire');

  route::resource('analyses', 'Analyses\AnalyseController');

  route::resource('anaactes', 'Analyses\AnaacteController');

  route::resource('anapacks', 'Analyses\AnapackController');

  route::get('estserie/{id}', 'Analyses\AnapackController@estSerie')->name('estserie');

  route::resource('demandes', 'Labo\DemandeController');

  Route::resource('user', 'UserController');

  Route::resource('laboAdmin', 'Labo\LaboAdminController');

  Route::resource('vetoAdmin', 'Labo\VetoAdminController');

  Route::resource('eleveurAdmin', 'Labo\EleveurAdminController');

  Route::resource('serie', 'Labo\SerieController');

  Route::get('usertypes', 'UsertypeController@liste')->name('usertypeJson');

});
