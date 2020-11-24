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

Route::get('/', function () {
    return view('home');
})->name('home');

// User

Route::get('/user/login', [AuthController::class, 'showLoginForm'])->name('user.login-form')->name('login');
Route::post('/user/login', [AuthController::class, 'logIn'])->name('user.login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/logout', [AuthController::class, 'logOut'])->name('user.logout');

    Route::get('/user', [UserController::class, 'showAccount'])->name('user.acc');
    Route::get('/user/pass', [UserController::class, 'showPassForm'])->name('user.pass-form');
    Route::put('/user/pass', [UserController::class, 'changePassword'])->name('user.update-pass');
});

Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', function(){return view('admin.panel');})->name('admin.panel');


    Route::get('users', [UserController::class, 'showList'])->name('user.show-list');

    Route::get('user', [UserController::class, 'showCreateForm'])->name('user.create-form');
    Route::post('user', [UserController::class, 'store'])->name('user.store');

    Route::get('user/{user}', [UserController::class, 'showEditForm'])->name('user.edit-form');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');


    Route::get('game', [GameController::class, 'showCreateForm'])->name('game.create');
    Route::post('game', [GameController::class, 'store'])->name('game.store');

    Route::get('game/{game}/edit', [GameController::class, 'showEditForm'])->name('game.edit');
    Route::put('game/{id}/edit', [GameController::class, 'update'])->name('game.update');


    Route::get('game/{game}/player', [GamePlayerController::class, 'showCreateFormForGame'])->name('game.player.create-for-game');
    Route::post('game/player', [GamePlayerController::class, 'store'])->name('game.player.store');

    Route::get('game/player/{player}', [GamePlayerController::class, 'showEditForm'])->name('game.player.edit');
    Route::put('game/player/{id}', [GamePlayerController::class, 'update'])->name('game.player.update');
});

// Day

Route::get('/day/{day}', [DayController::class, 'show'])->name('day.show');
Route::get('/days', [DayController::class, 'showList'])->name('day.show-list');

// Player

Route::get('/player/{player}', [PlayerController::class, 'show'])->name('player.show');
Route::get('/players', [PlayerController::class, 'showList'])->name('player.show-list');

// Game

Route::get('/game/{game}', [GameController::class, 'show'])->name('game.show');
Route::get('/games', [GameController::class, 'showList'])->name('game.show-list');
