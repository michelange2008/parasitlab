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

Route::get('/laboratoire', 'Labo\LaboController@index')->name('laboratoire');

Route::get('/eleveur', 'EleveurController@index')->name('eleveur');

Route::get('/veterinaire', 'VeterinaireController@index')->name('veterinaire');

Route::group(['middleware' => 'auth', 'middleware' => 'labo', 'prefix' => "laboratoire"], function(){

  route::resource('demandes', 'Labo\DemandeController');

  Route::resource('user', 'UserController');

  Route::resource('vetoAdmin', 'Labo\VetoAdminController');

  Route::resource('eleveurAdmin', 'Labo\EleveurAdminController');
});
