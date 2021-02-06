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
    return view('home');
});

Auth::routes();

Route::get('/personas', 'PersonasController@index')->name('personas');
Route::post('/personas', 'PersonasController@store')->name('addPersonas');
Route::put('/personas', 'PersonasController@update')->name('editPersona');