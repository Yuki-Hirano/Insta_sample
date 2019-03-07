<?php

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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



Route::get('github', 'Github\GithubController@top');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/login', 'Auth\LoginController@redirectToInitialpage');
Route::get('/logout','Auth\LoginController@Logout');
Route::post('/home', 'PostController@upload');
Route::get('/home', 'HomeController@viewing');
Route::get('/profile/{user_name}', 'ProfileController@profileViewing');
Route::get('/write_post', 'HomeController@redirectToPostpage');
Route::post('/favorite', 'FavoriteController@registerFav');
Route::post('/favorite_by', 'FavoriteController@showFavBy');
