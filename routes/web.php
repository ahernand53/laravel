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

Route::get('/', 'PagesController@home');

Route::get('/messages/{message}', 'MessagesController@show');
Route::post('/messages/create', 'MessagesController@create')
    ->middleware('auth');

Auth::routes();

Route::get('/{username}/follows', 'UsersControllers@follows');
Route::get('/{username}/followers', 'UsersControllers@followers');
Route::post('/{username}/follow', 'UsersControllers@follow');
Route::post('/{username}/unfollow', 'UsersControllers@unfollow');
Route::get('/{username}', 'UsersControllers@show');

