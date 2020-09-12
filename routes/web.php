<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

//create image upload form
Route::get('informationvendeurs/allinfoposition','InformationVendeurController@allinfoposition')->name('allinfoposition');
Route::get('informationvendeurs/archive','InformationVendeurController@archive')->name('archive');
Route::patch('/infopositionvendeurs/{id}/restore','InfoPositionVendeurController@restore');
Route::resource('/informationvendeurs', 'InformationVendeurController');
Route::resource('/infopositionvendeurs', 'InfoPositionVendeurController')->middleware('auth');



//reclamation
Route::get('reclamations/inbox','ReclamationController@inbox')->name('inbox')->middleware('auth');;
Route::get('reclamations/sent','ReclamationController@sent')->name('sent')->middleware('auth');;
Route::resource('/reclamations', 'ReclamationController');
Route::resource('/typereclamations', 'TypeReclamationController')->middleware('auth');;
//route::put('/recla/{reclamation}','ReclamationController@updateReclamation')->name('updatereclamation');
//Hamarrass added this composer dumpautoload
//php artisan queue:restart


//map
Route::get('map/displayteams','TeamController@displayteams')->name('displayteams')->middleware('auth');;
Route::resource('/map','TeamController')->middleware('auth');;



