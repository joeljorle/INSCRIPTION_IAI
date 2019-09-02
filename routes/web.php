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

Route::get('/', function () {
    \App\func::check();
    return redirect()->route('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/welcomeg', function () {

return view('auth.register');

});

Auth::routes();

Route::resource('admin', 'adminController');
Route::resource('etudiants', 'EtudiantController');
Route::resource('classes', 'ClassesController');
Route::resource('filieres', 'FilieresController');
Route::resource('moratoires', 'MoratoireController');
Route::resource('penalites', 'PenaliteController');
Route::resource('unitepaiements', 'UnitepaiementController');
Route::resource('paiementdistances', 'PaiementdistanceController');
Route::resource('paiements', 'PaiementController');
Route::resource('modelpaiements', 'ModelpaiementController');


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/etudiantssearch', 'EtudiantController@search')->name('etudiants.search');
Route::get('/moratoire/{unite}/{etudiant}', 'MoratoireController@create1')->name('moratoires.create1');
Route::get('/penalite/{unite}/{etudiant}', 'PenaliteController@create1')->name('penalites.create1');
Route::get('/moratoireerase/{etudiant}', 'MoratoireController@erase')->name('moratoires.erase');
Route::get('/moratoireeraseall', 'MoratoireController@eraseall')->name('moratoires.eraseall');
Route::get('/penaliteerase/{etudiant}', 'EtudiantController@erase')->name('penalites.erase');
Route::get('/penaliteeraseall', 'PenaliteController@eraseall')->name('penalites.eraseall');
Route::get('/penaliteeraseallmodel', 'PenaliteController@eraseallmodel')->name('penalites.eraseallmodel');
Route::get('/paiement2', 'PaiementController@store1')->name('paiement2.store');
Route::get('/paiement3', 'PaiementController@store2')->name('paiement3.store');
Route::get('/print', 'PaiementController@print')->name('paiements.print');


