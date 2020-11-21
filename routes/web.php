<?php

use Illuminate\Support\Facades\Route;

use App\Models\Player;
use App\Models\Day;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\GamePlayer;

use App\Http\Controllers\GameController;

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

Route::get('/player/{player}', function (Player $player) {
    return view('player/show', ['player' => $player]);
})->name('player.show');

// Game

Route::get('/game', [GameController::class, 'showCreateForm'])->name('game.create');
Route::post('/game', [GameController::class, 'store'])->name('game.store');
Route::get('/game/{game}', [GameController::class, 'show'])->name('game.show');

Route::get('/game/{game}/edit', [GameController::class, 'showEditForm'])->name('game.edit');
Route::put('/game/{game}/edit', [GameController::class, 'update'])->name('game.update');

Route::get('/game/{game}/player', [GameController::class, 'showCreateForm'])->name('game.players.create');
Route::put('/game/{game}/player', [GameController::class, 'store'])->name('game.players.store');
