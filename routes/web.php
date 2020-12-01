<?php

use Illuminate\Support\Facades\Route;

use App\Models\Player;
use App\Models\Day;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\GamePlayer;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GamePlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TournamentController;

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

// /

Route::get('/', function () {return view('home');})->name('home');

Route::group(['middleware' => ['role:any'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/logout', 'AuthController@logOut')->name('logout');

    Route::get('/', 'UserController@showAccount')->name('acc');
    Route::get('/pass', 'UserController@showPassForm')->name('pass-form');
    Route::put('/pass', 'UserController@changePassword')->name('update-pass');
});

Route::group(['middleware' => ['role:guest'], 'prefix' => 'user'], function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login', 'AuthController@logIn')->name('user.login');
});

Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', function(){return view('admin.panel');})->name('admin.panel');

    Route::get('users', 'UserController@showList')->name('user.show-list');
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', 'UserController@showCreateForm')->name('create-form');
        Route::get('/{user}', 'UserController@showEditForm')->name('edit-form');

        Route::post('/', 'UserController@store')->name('store');
        Route::put('/{id}', 'UserController@update')->name('update');
    });

    Route::group(['prefix' => 'day', 'as' => 'day.'], function () {
        Route::get('/', 'DayController@showCreateForm')->name('create-form');
        Route::get('/{day}', 'DayController@showEditForm')->name('edit-form');

        Route::post('/', 'DayController@store')->name('store');
        Route::put('/{id}', 'DayController@update')->name('update');
        Route::delete('/{id}', 'DayController@delete')->name('delete');
    });

    Route::group(['prefix' => 'tournament', 'as' => 'tournament.'], function () {
        Route::get('/', 'TournamentController@showCreateForm')->name('create-form');
        Route::get('/{tournament}', 'TournamentController@showEditForm')->name('edit-form');

        Route::post('/', 'TournamentController@store')->name('store');
        Route::put('/{id}', 'TournamentController@update')->name('update');
        Route::delete('/{id}', 'TournamentController@delete')->name('delete');
    });

    Route::group(['prefix' => 'player', 'as' => 'player.'], function () {
        Route::get('/', 'PlayerController@showCreateForm')->name('create-form');
        Route::get('/{player}', 'PlayerController@showEditForm')->name('edit-form');

        Route::post('/', 'PlayerController@store')->name('store');
        Route::put('/{id}', 'PlayerController@update')->name('update');
        Route::delete('/{id}', 'PlayerController@delete')->name('delete');
    });

    Route::group(['prefix' => 'game', 'as' => 'game.'], function () {
        Route::get('/', 'GameController@showCreateForm')->name('create-form');
        Route::get('/{game}', 'GameController@showEditForm')->name('edit-form');

        Route::post('/', 'GameController@store')->name('store');
        Route::put('/{id}', 'GameController@update')->name('update');
        Route::delete('/{id}', 'GameController@delete')->name('delete');
    });

    Route::group(['prefix' => 'gplayer', 'as' => 'game.player.'], function () {
        Route::get('/', 'GamePlayerController@showCreateForm')->name('create-form');
        Route::get('/{gPlayer}', 'GamePlayerController@showEditForm')->name('edit-form');

        Route::post('/', 'GamePlayerController@store')->name('store');
        Route::put('/{id}', 'GamePlayerController@update')->name('update');
        Route::delete('/{id}', 'GamePlayerController@delete')->name('delete');
    });

});

Route::group(['as' => 'day.'], function () {
    Route::get('/day/{day}', 'DayController@show')->name('show');
    Route::get('/days', 'DayController@showList')->name('show-list');
});

Route::group(['as' => 'tournament.'], function () {
    Route::get('/tournament/{tournament}', 'TournamentController@show')->name('show');
    Route::get('/tournaments', 'TournamentController@showList')->name('show-list');
});

Route::group(['as' => 'player.'], function () {
    Route::get('/player/{player}', 'PlayerController@show')->name('show');
    Route::get('/players', 'PlayerController@showList')->name('show-list');
});

Route::group(['as' => 'game.'], function () {
    Route::get('/game/{game}', 'GameController@show')->name('show');
    Route::get('/games', 'GameController@showList')->name('show-list');
});
