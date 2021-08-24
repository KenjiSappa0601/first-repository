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


Route::get('/', 'SpotController@index');
Route::get('/spots/search', 'SpotController@search');
Route::get('/spots/create', 'SpotController@create');
Route::get('/spots/{spot}/edit', 'SpotController@edit');
Route::put('/spots/{spot}', 'SpotController@update');
Route::delete('/spots/{spot}', 'SpotController@destroy');
Route::get('/spots/{spot}', 'SpotController@show');
Route::post('/spots', 'SpotController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
