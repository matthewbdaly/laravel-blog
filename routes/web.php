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

Route::get('/', 'FrontPageController@index');
Route::get('/search', 'FrontPageController@search');
Route::get('/posts/{page}', 'FrontPageController@page');
Route::get('/{slug}', 'FrontPageController@bySlug')->where('slug', '^\d{4}/\d{2}/\d{2}/[a-zA-Z0-9-]+/?$');
Route::get('{path}', '\Matthewbdaly\LaravelFlatpages\Http\Controllers\FlatpageController@page');
