<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles/{articles}', 'ArticlesController@show');

Route::get('articles/paginate/{offset}/{limit?}', 'ArticlesController@showLimited');

Route::get('articles/', 'ArticlesController@index');

Route::get('articles-by-user/{id}', 'ArticlesController@getArticlesByUserId');

Route::get('users/apitoken/{id}', 'UserController@getApiToken');

Route::group(['middleware' => 'auth:api'], function() {    

    Route::get('users/{id}', 'UserController@show');

    Route::post('articles/', 'ArticlesController@store')->name('newArticle');
});
