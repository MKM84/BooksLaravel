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
Route::get('/', 'FrontController@index');
Route::get('book/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);
Route::get('author/{id}', 'FrontController@showBookByAuthor')->where(['id' => '[0-9]+']);
Route::get('genre/{id}', 'FrontController@showBookByGenre')->where(['id' => '[0-9]+']);

Auth::routes();

// routes sécurisées
Route::resource('/home', 'BookController')->middleware('auth');
Route::resource('admin/book', 'BookController')->middleware('auth');
