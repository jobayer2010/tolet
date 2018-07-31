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

Auth::routes();

Route::get('/', 'ToletController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'HomeController@getalluser')->name('home.users');

Route::delete('tolet/image/{id}/{pid}', 'ToletController@destroyImage')->name('tolet.image');

Route::resource('tolet', 'ToletController');

Route::get('bookmark', 'BookmarkController@index')->name('bookmark.index');

Route::post('bookmark/{tid}', 'BookmarkController@create')->name('bookmark.create');

Route::delete('bookmark/{tid}', 'BookmarkController@destroy')->name('bookmark.remove');
