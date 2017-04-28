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


use Illuminate\Http\Request;

// Vocabs collection routes
Route::get('/vocabs', 'VocabController@index');
Route::post('/vocabs', 'VocabController@create');

// Vocabs singular routes
Route::get('/vocabs/{id}', 'VocabController@show');
Route::put('/vocabs/{id}', 'VocabController@update');
Route::delete('/vocabs/{id}', 'VocabController@destroy');


Route::get('/', function () {
  return view('app');
});

Route::get('/credits', function () {
  return view('credits');
});

Route::get('/styleguide', function () {
  return view('styleguide');
});
