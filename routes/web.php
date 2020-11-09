<?php

use Illuminate\Support\Facades\Route;

use App\Models\Player;
use App\Models\Day;
use App\Models\Tournament;
use App\Models\Game;
use App\Models\GamePlayer;

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

Route::get('/game/{game}', function (Game $game) {
    return view('game', ['game' => $game]);
})->name('game');

Route::get('/player/{player}', function (Player $player) {
    return view('player', ['player' => $player]);
})->name('player');
