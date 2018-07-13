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


Auth::routes();
Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::post('/auth/facebook/register', 'SocialAuthController@register');


Route::group(['middleware' => 'auth'], function (){
    Route::post('/{username}/dms', 'UsersControllers@sendPrivateMessage');
    Route::post('/messages/create', 'MessagesController@create');
    Route::get('/conversation/{conversation}', 'UsersControllers@showConversation');

    Route::post('/{username}/follow', 'UsersControllers@follow');
    Route::post('/{username}/unfollow', 'UsersControllers@unfollow');
});

Route::get('/{username}/follows', 'UsersControllers@follows');
Route::get('/{username}/followers', 'UsersControllers@followers');
Route::get('/{username}', 'UsersControllers@show');


