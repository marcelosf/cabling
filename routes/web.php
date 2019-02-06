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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('locals', 'LocalsController')->middleware('cors');
    Route::resource('racks', 'RacksController')->middleware('cors');
    Route::resource('patches', 'PatchesController')->middleware('cors');
    Route::resource('switch-port', 'SwitchPortsController')->middleware('cors');
    Route::resource('voice-port', 'VoicePortController')->middleware('cors');

});

Auth::routes();

Route::get('login/senhaunica', 'Auth\LoginController@redirectToProvider')->name('login.senhaunica');
Route::get('login/senhaunica/callback', 'Auth\LoginController@handleProviderCallback');