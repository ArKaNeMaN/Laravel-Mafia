<?php

use Illuminate\Support\Facades\Route;

use App\Models\Player;
use App\Models\Day;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\GamePlayer;

use App\Http\Controllers\DayController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GamePlayerController;

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

Route::get('/game', [GameController::class, 'showCreateForm'])->name('game.create');
Route::post('/game', [GameController::class, 'store'])->name('game.store');

Route::get('/game/{game}/edit', [GameController::class, 'showEditForm'])->name('game.edit');
Route::put('/game/{id}/edit', [GameController::class, 'update'])->name('game.update');

// GamePlayer

// Route::get('/game/player', [GamePlayerController::class, 'showCreateForm'])->name('game.player.create');
Route::get('/game/{game}/player', [GamePlayerController::class, 'showCreateFormForGame'])->name('game.player.create-for-game');
Route::post('/game/player', [GamePlayerController::class, 'store'])->name('game.player.store');

Route::get('/game/player/{player}', [GamePlayerController::class, 'showEditForm'])->name('game.player.edit');
Route::put('/game/player/{id}', [GamePlayerController::class, 'update'])->name('game.player.update');
