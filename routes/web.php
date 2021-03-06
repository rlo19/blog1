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

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/{uid}', 'HomeController@userProfile');

Route::get('/profile/{uid}/{aid}', 'ArticlesController@userArticle');

Route::get('users/apitoken/{id}', 'UserController@getApiToken')->middleware('auth');
