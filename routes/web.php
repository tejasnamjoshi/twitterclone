<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');

    Route::get('/profiles/{user:username}', 'ProfilesController@index')->name('profile');

    Route::post('/profiles/{user:username}/follow', 'FollowsController@store')->name('follow');
    Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')->middleware('can:edit,user');

    Route::patch('/profiles/{user:username}', 'ProfilesController@update')->name('update')->middleware('can:edit,user');

    Route::post('/tweets/{tweet}/like', 'TweetsController@like');
    Route::delete('/tweets/{tweet}/like', 'TweetsController@dislike');

    Route::get('/admin-panel', 'AdminPanelController@index')->middleware('can:update,App\User');

    Route::patch('/make-admin/{user:username}', 'AdminPanelController@edit')->middleware('can:update,App\User');

    Route::get('/explore/{user:username}/followers', 'ExploreController@followers');
    Route::get('/explore/{user:username}/follows', 'ExploreController@follows');

    Route::get('/profiles/{user:username}/block', 'ProfilesController@block');

    Route::get('/chatlist', 'MessageController@index');

    Route::get('/chat/{user:username}', 'MessageController@show');
    Route::post('/chat/{user:username}', 'MessageController@store');
});

Route::get('/explore', 'ExploreController');

Auth::routes();
