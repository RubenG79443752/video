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
    return view('master');
});

Route::get('persona', 'PersonaController@index')->name('persona.index');
Route::get('persona/nuevo', 'PersonaController@create')->name('persona.nuevo');
Route::post('persona/guarda', 'PersonaController@store')->name('persona.guarda');
Route::get('persona/mostrar/{id}', 'PersonaController@show')->name('persona.mostrar');
Route::get('persona/{id}/editar', 'PersonaController@edit')->name('persona.editar');
Route::post('persona/actualizar', 'PersonaController@update')->name('persona.actualizar');
Route::get('persona/eliminar/{id}', 'PersonaController@destroy')->name('persona.eliminar');

Route::get('idioma', 'IdiomaController@index')->name('idioma.index');
Route::get('idioma/nuevo', 'IdiomaController@create')->name('idioma.nuevo');
Route::post('idioma/guarda', 'IdiomaController@store')->name('idioma.guarda');

Route::get('idioma/eliminar/{id}', 'IdiomaController@destroy')->name('idioma.elimina');

Route::get('pelicula', 'PeliculaController@index')->name('peli.index');
Route::get('pelicula/nuevo', 'PeliculaController@create')->name('peli.nuevo');
Route::post('pelicula/guarda', 'PeliculaController@store')->name('peli.guarda');