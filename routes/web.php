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
Route::get('/', ['uses' => 'Extranet\ExtranetController@accueil', 'as' => 'accueil']);

Auth::routes();

Route::get('/accueil', 'Extranet\Controller@accueil')->name('accueil');

Route::get('/admin', 'AdminController@adminIndex')->name('adminIndex');

Route::get('/intranet', 'IntranetController@intranetIndex')->name('intranetIndex');
