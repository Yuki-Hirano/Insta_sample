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

/*Route::get('/', function () {
    return view('welcome');
});
*/

//STEP1
//Route::get('/user', 'UserController@index');
//Route::get('/bbs', 'BbsController@index');
//Route::post('/bbs', 'BbsController@create');

//sample
Route::get('github', 'Github\GithubController@top');
//Route::post('github/issue', 'Github\GithubController@createIssue');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('/user', 'Users\UserController@updateUser');
//Route::get('/', 'HomeController@index');
//Route::post('/upload', 'HomeController@upload');

//implement by myself
Route::get('/login', function () {
    return view('login');
});
Route::post('/upload', 'HomeController2@upload');
Route::get('/upload', 'HomeController2@viewing');
Route::get('/profile', 'ProfileController@top');
Route::get('/write_post', function () {
    return view('toukou');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});
