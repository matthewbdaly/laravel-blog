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
Route::get('/admin/{resource}', 'AdminResourceController@index')->middleware('admin_model_exists')->name('admin.resource');
Route::get('/admin/{resource}/create', 'AdminResourceController@create')->middleware('admin_model_exists')->name('admin.resource.create');
Route::post('/admin/{resource}', 'AdminResourceController@store')->middleware('admin_model_exists');
Route::get('/admin/{resource}/{id}', 'AdminResourceController@show')->middleware('admin_model_exists')->name('admin.resource.show');
Route::put('/admin/{resource}/{id}', 'AdminResourceController@update')->middleware('admin_model_exists')->name('admin.resource.update');
Route::patch('/admin/{resource}/{id}', 'AdminResourceController@update')->middleware('admin_model_exists');
Route::delete('/admin/{resource}/{id}', 'AdminResourceController@destroy')->middleware('admin_model_exists')->name('admin.resource.delete');
