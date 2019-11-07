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

Route::get('/accueil', 'Extranet\ExtranetController@accueil')->name('accueil');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminController@adminIndex')->name('adminIndex');

Route::get('/intranet', 'Intranet\IntranetController@intranetIndex')->name('intranetIndex');
