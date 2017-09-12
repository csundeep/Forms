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

Route::get('/', array('uses' => 'MessageBoardController@showMessageBoard'));

Route::get('login', array('uses' => 'LoginController@showLogin'));
Route::get('post/login', array('uses' => 'LoginController@showLogin'));
Route::post('login', array('uses' => 'LoginController@doLogin'))->middleware('login');
Route::post('post/login', array('uses' => 'LoginController@postLogin'));
Route::get('logout', array('uses' => 'LoginController@doLogout'));
Route::get('post/logout', array('uses' => 'LoginController@doLogout'));


Route::get('register', array('uses' => 'RegisterController@showRegistration'));
Route::get('post/register', array('uses' => 'RegisterController@showRegistration'));
Route::post('register', array('uses' => 'RegisterController@doRegistration'));
Route::post('post/register', array('uses' => 'RegisterController@doRegistration'));

Route::post('postQuery', array('uses' => 'MessageBoardController@postQuery'));
Route::get('post/{id}', array('uses' => 'MessageBoardController@showPost'));
Route::get('postComment/{comment}', array('uses' => 'MessageBoardController@postComment'));

Route::get('test/{user}', function (\App\User $user) {

    // we now have access to the $post object! no code necessary
    dd($user);
    // return the view and the post
    return view('post.show', compact('post'));
});